<script type="text/javascript">
    $(() => {
        init()

    })
    init = () => {
         onEdit();
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
    onEdit = () => {
        blockPage();
        $.ajax({
            url: "{{ route('profile.show') }}",
            type: "GET",
            success: (response) => {
                console.log(response.data);
            },
            complete: (response) => {
                unblockPage();
            }
        });
    }
</script>
