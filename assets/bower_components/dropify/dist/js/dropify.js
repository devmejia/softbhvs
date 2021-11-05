(function($) {
  'use strict';
  $('.dropify').dropify({
      messages: {
        'default': 'Arrastre y suelte un archivo aquí o haga clic',
        'replace': 'Arrastre y suelte un archivo aquí o haga clic',
        'remove':  'Suprimir',
        'error':   'Ooops, algo salió mal.'
      },
      error: {
        'fileSize': 'El tamaño del archivo es demasiado grande ({{ value }} max).',
        'minWidth': 'El ancho de la imagen es demasiado pequeño ({{ value }}}px min).',
        'maxWidth': 'El ancho de la imagen es demasiado grande ({{ value }}}px max).',
        'minHeight': 'La altura de la imagen es demasiado pequeña ({{ value }}}px min).',
        'maxHeight': 'La altura de la imagen es demasiado grande ({{ value }}px max).',
        'imageFormat': 'El formato de imagen no está permitido ({{ value }} solamente).'
    },
    tpl: {
      wrap:            '<div class="dropify-wrapper"></div>',
      loader:          '<div class="dropify-loader"></div>',
      message:         '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
      preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
      filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
      clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
      errorLine:       '<p class="dropify-error">{{ error }}</p>',
      errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
  }
  });
})(jQuery);
