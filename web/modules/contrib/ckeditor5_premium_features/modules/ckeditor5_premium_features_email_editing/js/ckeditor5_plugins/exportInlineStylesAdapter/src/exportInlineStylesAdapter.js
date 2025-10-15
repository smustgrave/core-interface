/*
 * Copyright (c) 2003-2025, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

class ExportInlineStylesAdapter {

  constructor( editor ) {
    this.editor = editor;
    this.form = this.editor.sourceElement.closest('form');
    this.disabledAttributeName = 'data-ckeditor5-block-' + this.editor.id;
  }

  init() {
    const editor = this.editor;
    const formElementId = this.editor.config._config.exportInlineStyles.formElement;
    const formElement = document.getElementById(formElementId);

    if (!formElement) {
      return;
    }
    const command = this.editor.commands.get( 'exportInlineStyles' );
    if ( !command ) {
      return;
    }

    const sourceEditingPlugin = this.editor.plugins.has( 'SourceEditing' ) ? this.editor.plugins.get( 'SourceEditing' ) : null;
    if ( sourceEditingPlugin ) {
      sourceEditingPlugin.on( 'change:isSourceEditingMode', (eventInfo, name, value, oldValue) => {
        if ( value ) {
          console.log('source enabled');
          this.disableSubmitButtons();
        } else {
          console.log('source disabled');
          this.enableSubmitButtons();
        }
      });
    }

    let exported = false;

    this.form.addEventListener("submit", (event) => {
      if (exported) {
        return;
      }
      event.preventDefault();
      let commandExec = editor.execute('exportInlineStyles');
      if (commandExec instanceof Promise) {
        commandExec.then((result) => {
          formElement.value = result;
          console.log('Exported inline styles');
        })
        .then(() => {
          // Ensure the form is submitted after the value is set.
          const submitterId = event.submitter.id;
          document.getElementById(submitterId).click();
          exported = true;
          console.log('Form submitted with inline styles');
        })
        .catch((error) => {
          const submitterId = event.submitter.id;
          document.getElementById(submitterId).click();
          console.error('Error exporting inline styles');
        });
      }
    });
  }

  /**
   * Disables all submit buttons in the form that contains the editor.
   */
  disableSubmitButtons() {
    if (!this.form) {
      return;
    }

    this.submitElements = this.form.querySelectorAll('input[type="submit"], button[type="submit"]');

    Array.from(this.submitElements).forEach(element => {
      element.disabled = true;
      element.setAttribute(this.disabledAttributeName, true);
    });
  }

  /**
   * Remove lock on submit buttons in the form that contains the editor.
   * Re-enable the buttons if there is no more locks applied.
   */
  enableSubmitButtons() {
    if (!this.form) {
      return;
    }

    Array.from(this.submitElements).forEach(element => {
      element.removeAttribute(this.disabledAttributeName);
      if (!this.hasDataBlockedAttribute(element)) {
        element.disabled = false;
      }
    });
  }

  /**
   * Checks if an element is blocked by CKEditor still being loaded'
   * @param {HTMLElement} element - The DOM element to check
   * @returns {boolean} - True if such attributes exist, false otherwise
   */
  hasDataBlockedAttribute(element) {
    if (!element || !element.hasAttributes()) {
      return false;
    }

    for (let attr of element.attributes) {
      if (attr.name.startsWith('data-ckeditor5-block-')) {
        return true;
      }
    }

    return false;
  }

}

export default ExportInlineStylesAdapter;
