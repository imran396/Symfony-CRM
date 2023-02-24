jQuery(function () {

    var actionForProceed;
    var $deleteModal = $('#deleteModal');
    var $dbEnumModal = $('#dbEnumModal');
    var anotherValueLabel = $dbEnumModal.find('h3').text();

    $('.searchSelect').select2({allowClear: true});
    $('select.dbEnum').each(function() {
        var select = $(this);
        select.after($('<button class="btn btn-another-value">' + anotherValueLabel + '</button>').click(function(e) {
            e.preventDefault();
            $dbEnumModal.modal('show');
            actionForProceed = function () {
                if ($('#amendDbEnumValue').val().trim() == '') {
                    return false;
                } else {
                    var value = 'inject|' + ($('#amendDbEnumReuse').prop("checked") ? '1' : '0') + '|' + $('#amendDbEnumValue').val();
                    select.append($('<option value="' + value + '">' + $('#amendDbEnumValue').val() + '</option>')).val(value).change();
                    $('#amendDbEnumReuse').prop('checked', false);
                    $('#amendDbEnumValue').val('');
                    $dbEnumModal.modal('hide');
                    return true;
                }
            };
        }));
    });

    $('[data-dismiss="deleteAction"],[data-dismiss="amendDbEnumAction"]').click(function () {
        if (actionForProceed) {
            if (actionForProceed()) {
                actionForProceed = null;
            }
        }
    });

    $deleteModal.on('hidden.bs.modal', function (e) {
        actionForProceed = null;
    });

    var proceedSubmit = false;


    $('form').submit(function (event) {
        var $this = $(this);
        var $methodTag = $this.find('[name="_method"]');

        if ($methodTag.length && $methodTag.val() == "DELETE" && !proceedSubmit) {
            event.preventDefault();
            $deleteModal.modal('show');

            switch ($this.attr('data-delete-type')) {
                case 'upload':

                    actionForProceed = function () {
                        $deleteModal.modal('hide');
                        $row = $this.parents('tr');
                        $row.hide(300, function () {
                            $.ajax({
                                url: $this.attr('action'),
                                context: document.body,
                                type: "POST",
                                data: $this.serializeArray(),
                                statusCode: {
                                    200: function () {
                                        $row.remove();
                                    }
                                }
                            });
                        });
                        return true;
                    };

                    break;

                default :
                    actionForProceed = function () {
                        $deleteModal.modal('hide');
                        proceedSubmit = true;
                        $this.submit();
                        return true;
                    };
                    break;
            }
        }
    });

    $numbered = $('pre.numbered');
    $numbered.html('<table>' + $.map($numbered.text().split('\n'),function (t, i) {
        return '<tr><th>' + (i + 1) + '.</th><td>' + t + '</td></tr>';
    }).join('') + '</table>');

});


