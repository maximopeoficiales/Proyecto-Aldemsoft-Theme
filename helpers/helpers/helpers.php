<?php
function aldem_show_message_custom($msg_success, $msg_error): void
{
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == '1') {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $msg_success . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                ';
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>' . $msg_error . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                ';
        }
    }
}
