<script type="text/javascript">
    $(() => {
        init()

    })
    init = () => {
         show();
         quick.unblockPage()
    }
    changeMenu = (type, el) => {
        $('.profileMenu').removeClass('btn-primary')
        $('.profileMenu').css("background-color", "")
        $('.profileMenu').addClass('text-gray-900')
        $(el).removeClass('text-gray-900')
        $(el).addClass('btn-primary')
        $(el).css("background-color", "#117CB2")

        if (type == "profile") {
            $("#ubahProfile-tab").click();
        } else if (type == "password") {
            $("#ubahPassword-tab").click();
        }
    }
    show = () => {
        quick.blockPage();
        $.ajax({
            url: APP_URL + 'profile/show',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: 'profile',
                },
            success: (response) => {
                // console.log(response.data);
                let data = response.data;
                console.log(response)
                $('#username').val(data.name);
                $('#name').val(data.users_fullname);
                $('#email').val(data.email);
            },
            complete: (response) => {
                quick.unblockPage();
            }
        });
    }
</script>
