/* global CodeMirror, codemirror */

/**
 * --------------------------------------------------------------------------
 * CoreUI Pro Boostrap Admin Template (3.2.0): markdown-editor.js
 * Licensed under MIT (https://coreui.io/license)
 * --------------------------------------------------------------------------
 */

/* eslint-disable no-magic-numbers */
var editor = CodeMirror.fromTextArea(codemirror, {
  mode: 'markdown',
  lineNumbers: true,
  theme: 'default',
  extraKeys: {
    Enter: 'newlineAndIndentContinueMarkdownList'
  }
});
editor.setSize('100%', 700);
/=markdown-editor.js.map