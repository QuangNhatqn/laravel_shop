$(document).ready(function (){
    $('.btn-show-pw').on('click', function (){
        $textBtn = $('.btn-show-pw').text();
        if($textBtn == 'Show'){
            $('#password').get(0).type = 'text';
            $('.btn-show-pw').text('Hide');
        } else {
            $('#password').get(0).type = 'password';
            $('.btn-show-pw').text('Show');
        }
    });
});
