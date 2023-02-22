var countItem = 0;
var _token   = $('meta[name="csrf-token"]').attr('content');

function actionDelete(event, that) {
    event.preventDefault();
    let urlRequest = that.attr('data-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',  // http method
                url: urlRequest,
                // data: { myData: 'This is my data.' },  // data to submit
                success: function (data, status, xhr) {
                    if (data.code == 200) {
                        that.closest('tr').remove();
                        countAllItem('delete', 1);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else {
                        alertError('Delete');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alertError('Delete');
                }
            });
        }
    })
}

function ajaxMultipleDelete(event, that, _token, urlRequest, list_item) {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: list_item.length + " selected item. You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',  // http method
                url: urlRequest,
                data: {
                    listItemId: list_item,
                    _token: _token
                },  // data to submit
                success: function (data, status, xhr) {
                    if (data.code == 200) {
                        $('input[name="list_selected[]"]:checked').each(function () {
                            $(this).closest('tr').remove();
                        });
                        countSeletedItem();
                        countAllItem('delete', list_item.length);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else {
                        alertError('Delete');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alertError('Delete');
                }
            });
        }
    })
}

function ajaxRemoveTrash(event, that, _token, urlRequest, list_item, type) {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: list_item.length + " selected item. You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',  // http method
                url: urlRequest,
                data: {
                    listItemId: list_item,
                    _token: _token
                },  // data to submit
                success: function (data, status, xhr) {
                    if (data.code == 200) {
                        if(type == 'item'){
                            that.closest('tr').remove();
                        } else if(type == 'multiple'){
                            $('input[name="list_selected[]"]:checked').each(function () {
                                $(this).closest('tr').remove();
                            });
                            countSeletedItem();
                        }
                        countAllItem('remove_trash', list_item.length);
                        Swal.fire(
                            'Remove Trash!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else {
                        alertError('Delete');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alertError('Delete');
                }
            });
        }
    })
}

function ajaxRecovery(event, that, _token, urlRequest, list_item, type) {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: list_item.length + " selected item.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, recovery it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',  // http method
                url: urlRequest,
                data: {
                    listItemId: list_item,
                    _token: _token
                },  // data to submit
                success: function (data, status, xhr) {
                    if (data.code == 200) {
                        if(type == 'item'){
                            that.closest('tr').remove();
                        } else if(type == 'multiple'){
                            $('input[name="list_selected[]"]:checked').each(function () {
                                $(this).closest('tr').remove();
                            });
                            countSeletedItem();
                        }
                        countAllItem('recovery', list_item.length);
                        Swal.fire(
                            'Recovery!',
                            'Your file has been rehabilitated.',
                            'success'
                        );
                    } else {
                        alertError('Recovery');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alertError('Recovery');
                }
            });
        }
    })
}

function alertError(actionName){
    Swal.fire({
        icon: 'error',
        title: actionName + ' fail',
        text: 'Something went wrong!',
        // footer: '<a href>Why do I have this issue?</a>'
    });
}

function countAllItem(action, num){
    var elementNumAll = $('.all').find('.count');
    var elementNumTrash = $('.trash').find('.count');
    switch (action){
        case 'delete':
            elementNumAll.text('(' + (parseInt(elementNumAll.text().replace('(', '').replace(')', '')) - num) + ')');
            elementNumTrash.text('(' + (parseInt(elementNumTrash.text().replace('(', '').replace(')', '')) + num) + ')');
            break;
        case 'recovery':
            elementNumAll.text('(' + (parseInt(elementNumAll.text().replace('(', '').replace(')', '')) + num) + ')');
            elementNumTrash.text('(' + (parseInt(elementNumTrash.text().replace('(', '').replace(')', '')) - num) + ')');
            break;
        case 'remove_trash':
            elementNumTrash.text('(' + (parseInt(elementNumTrash.text().replace('(', '').replace(')', '')) - num) + ')');
            break;
    }
}

function countSeletedItem(){
    countItem = 0;
    $('input[name="list_selected[]"]:checked').each(function () {
        countItem++;
    });
    if(countItem == 0)
        $('.count-selected-item').text('');
    else $('.count-selected-item').text('Selected: ' + countItem);
}

function getListItemSeleted(){
    var list_item = [];
    $('input[name="list_selected[]"]:checked').each(function () {
        list_item.push($(this).val());
    });
    return list_item;
}


$(document).ready(function () {
    //delete action
    $('.action_delete').on('click', function () {
        actionDelete(event, $(this));
    });

    //remove trash action
    $('.action_remove_trash').on('click', function () {
        var urlRequest = $(this).attr('data-url');
        var list_item = [];
        list_item[0] = $(this).closest('tr').find('input[name="list_selected[]"]').val();
        ajaxRemoveTrash(event, $(this), _token, urlRequest, list_item,  'item');
    });

    //recovery action
    $('.action_recovery').on('click', function (){
        var urlRequest = $(this).attr('data-url');
        var list_item = [];
        list_item[0] = $(this).closest('tr').find('input[name="list_selected[]"]').val();
        ajaxRecovery(event, $(this), _token, urlRequest, list_item, 'item');
    });

    //select all item
    $('.check-all-page').on('click', function () {
        $('input[name="list_selected[]"]').prop('checked', $('.check-all-page').prop('checked'));
        countSeletedItem();
    });

    $('input[name="list_selected[]"]').on('click', function () {
        countSeletedItem();
    });


    $('#btn_apply').on('click', function () {
        event.preventDefault();

        var action = $('#action_multiple').val();

        var urlRequest = $('#action_multiple').find(":selected").attr('data-url');

        switch (action){
            case 'delete':
                //delete multiple item
                ajaxMultipleDelete(event, $(this), _token, urlRequest, getListItemSeleted());
                break;
            case 'recovery':
                ajaxRecovery(event, $(this), _token, urlRequest, getListItemSeleted(), 'multiple');
                break;
            case 'remove_trash':
                ajaxRemoveTrash(event, $(this), _token, urlRequest, getListItemSeleted(),  'multiple');
                break;
        }

    });


});


