function checkNotification() {
    let status = false;
    let notification = $('#notificationCount').val();
    setInterval(function () {
        axios.get("{{route('followship.checkNotification')}}", {
            params: {
                count: notification,
            }
        }).then(data => {
            if (data.data.count != notification) {
                $('#notificationCount').val(data.data.count);
                if (status == false) {
                    status = true;
                    reloadNotifications("#notifications_show_action");
                }

            }
        }).catch(error => {
            console.log(error);
        })
    }, 8000);
}

function reloadNotifications(selector) {
    setInterval(function () {
        axios.get("{{route('followship.reloadNotifications')}}", {
            params: {}
        }).then(data => {
            $(selector).html(data.data);
        }).catch(error => {
            console.log(error);
        })
    }, 8000);
}
checkNotification();