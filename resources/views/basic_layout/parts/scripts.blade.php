<script type="text/javascript">
    function OpenNav() {
        document.getElementById("top-ctg-menu").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("top-ctg-menu").style.width = "0px";
    }

    $('.deleteProduct').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: '{{url('checkout1/deleteFromCart')}}',
            data: {_token: '{{csrf_token()}}', id: document.querySelector('.deleteProduct').getAttribute('data-id')},
            success: function (data) {
                window.location.reload();
            }
        });
    });

    $('.add-one').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'PATCH',
            url: '{{url('checkout1/updateCart')}}',
            data: {
                _token: '{{csrf_token()}}',
                id: document.querySelector('.deleteProduct').getAttribute('data-id'),
                amount: parseInt(document.querySelector('.amount-input').value) + 1
            },
            success: function (data) {
                window.location.reload();
            }
        });
    });

    $('.remove-one').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'PATCH',
            url: '{{url('checkout1/updateCart')}}',
            data: {
                _token: '{{csrf_token()}}',
                id: document.querySelector('.deleteProduct').getAttribute('data-id'),
                amount: (parseInt(document.querySelector('.amount-input').value) == 1 ? 1:parseInt(document.querySelector('.amount-input').value)-1),
            },
            success: function (data) {
                window.location.reload();
            }
        });
    });

    $('.amount-input').on('change', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'PATCH',
            url: '{{url('checkout1/updateCart')}}',
            data: {
                _token: '{{csrf_token()}}',
                id: document.querySelector('.deleteProduct').getAttribute('data-id'),
                amount: (parseInt(document.querySelector('.amount-input').value) < 1 ? 1:parseInt(document.querySelector('.amount-input').value)),
            },
            success: function (data) {
                window.location.reload();
            }
        });
    });
    function increaseInput()
    {
        document.querySelector('.amount-input').value = parseInt(document.querySelector('.amount-input').value) + 1;

    }
    function decreaseInput()
    {
        let ele = document.querySelector('.amount-input');
        ele.value = (parseInt(ele.value) == 1 ? 1:parseInt(ele.value) - 1);

    }


</script>