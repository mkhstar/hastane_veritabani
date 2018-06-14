$('.dropdown-toggle').dropdown();

function multipleSelectHandler(multipleSelector) {
  $(multipleSelector).multiselect({
    buttonWidth: '100%',
    buttonText: function (options, select) {
      if (options.length === 0) {
        return 'Sütünleri Seçin';
      } else {
        var labels = [];
        options.each(function () {
          if ($(this).attr('label') !== undefined) {
            labels.push($(this).attr('label'));
          } else {
            labels.push($(this).html());
          }
        });
        return labels.join(', ') + '';
      }
    },
    includeSelectAllOption: true,
    selectAllText: 'Hepsini Seçin',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    filterPlaceholder: 'Ara...'
  });

}