$(document).ready(function (){
   $('.checkbox-parent').on('click', function (){
       $(this).closest('.card').find('.checkbox-childrent').prop('checked', $(this).prop('checked'));
       if(!$(this).prop('checked')){
           $('#checkbox-all').prop('checked', false);
       }
   });
   $('#checkbox-all').on('click', function (){
       $('.checkbox-parent').prop('checked', $(this).prop('checked'));
       $('.checkbox-childrent').prop('checked', $(this).prop('checked'));
   });
    $('.checkbox-childrent').on('click', function (){
        if(!$(this).prop('checked')){
            $('#checkbox-all').prop('checked', false);
            $(this).closest('.card').find('.checkbox-parent').prop('checked', false);
        }
    });
});
