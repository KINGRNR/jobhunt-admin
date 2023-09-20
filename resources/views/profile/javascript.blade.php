<script type="text/javascript">
    $(() => {
        init()

    })
    init = () => {
         show();
         unblockPage();
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
        blockPage();
        $.ajax({
            url: "{{ route('profile.show') }}",
            type: "GET",
            dataType: "json",
            success: (response) => {
                // console.log(response.data);
                let data = response.data;
                $('#username').val(data.username);
                $('#name').val(data.fullname);
                $('#email').val(data.email);
            },
            complete: (response) => {
                unblockPage();
            }
        });
    }
</script>
