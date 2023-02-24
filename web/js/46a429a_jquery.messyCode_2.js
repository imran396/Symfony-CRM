jQuery(function () {

    var actionForProceed;
    $modal = $('#deleteModal');

    $('[data-dismiss="deleteAction"]').click(function () {

        if (actionForProceed) {
            actionForProceed();
        }

    });

    $modal.on('hidden.bs.modal', function (e) {
        actionForProceed = null;
    });

    var proceedSubmit = false;



    $('form').submit(function (event) {
        var $this = $(this);
        var $methodTag = $this.find('[name="_method"]');

        if ($methodTag.length && $methodTag.val() == "DELETE" && !proceedSubmit) {
            event.preventDefault();
            $('#deleteModal').modal('show');

            switch ($this.attr('data-delete-type')) {
                case 'upload':

                    actionForProceed = function () {
                        $modal.modal('hide');
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
                    };

                    break;

                default :
                    actionForProceed = function () {
                        $modal.modal('hide');
                        proceedSubmit = true;
                        $this.submit();
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


