<script type="text/javascript">
    function OpenNav() {
        document.getElementById("top-ctg-menu").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("top-ctg-menu").style.width = "0px";
    }

    function OpenLogin() {
        document.querySelector(".profile-nav").style.width = "200px";
    }

    function closeLogin() {
        document.querySelector(".profile-nav").style.width = "0px";
    }



    /*$('.add-to-cartForm').on('submit', function(e){
        e.preventDefault()

        let data = $(this).serialize();
        $.get('', data);
    });*/


    $('.deleteProduct').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: '<?php echo e(url('checkout1/deleteFromCart')); ?>',
            data: {_token: '<?php echo e(csrf_token()); ?>', id: $(e.target).attr('data-id')},
            success: function (data) {
                window.location.reload();
            }
        });
    });

    $('.add-one').on('click', function (e) {
        e.preventDefault();
        let ele = document.querySelector('#id' + $(e.target).attr('data-id'));
        $.ajax({
            method: 'GET',
            url: '<?php echo e(url('checkout1/updateCart')); ?>',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                id: $(e.target).attr('data-id'),
                amount: parseInt(ele.value) + 1
            },
            success: function (data) {
                ele.value = data;
            }
        });
    });
    $('.remove-one').on('click', function (e) {
        e.preventDefault();
        let valueInput = document.querySelector('#id' + $(e.target).attr('data-id'))
        $.ajax({
            method: 'GET',
            url: '<?php echo e(url('checkout1/updateCart')); ?>',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                id: $(e.target).attr('data-id'),
                amount: (parseInt(valueInput.value) == 1 ? 1 : parseInt(valueInput.value) - 1),
            },
            success: function (data) {
                valueInput.value =  data;
            }
        });
    });

    $('.amount-input').on('change', function (e) {
        e.preventDefault();
        let ele = document.querySelector('#id' + $(e.target).attr('data-id'));
        $.ajax({
            method: 'GET',
            url: '<?php echo e(url('checkout1/updateCart')); ?>',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                id: $(e.target).attr('data-id'),
                amount: (parseInt(ele.value) < 1 ? 1 : parseInt(ele.value)),
            },
            success: function (data) {

                ele.value = data;
            }
        });
    });
    function increaseInput()
    {
        document.querySelector('.amount-inputt').value = parseInt(document.querySelector('.amount-inputt').value) + 1;

    }
    function decreaseInput()
    {
        let ele = document.querySelector('.amount-inputt');
        ele.value = (parseInt(ele.value) == 1 ? 1:parseInt(ele.value) - 1);

    }


</script>