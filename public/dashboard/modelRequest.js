$('form[name="create_biolink_link"]').on('submit', event => {
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            console.log(data)
            if (data.status == 'error') {

                // let notification_container = $(event.currentTarget).find('.notification-container');

                // notification_container.html('');

                // display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

<

$('form[name="create_biolink_tiktok"]').on('submit', event => {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})


/* On modal show load new data */
$('#biolink_block_delete').on('show.bs.modal', event => {
    let biolink_block_id = $(event.relatedTarget).data('biolink-block-id');

    $(event.currentTarget).find('input[name="biolink_block_id"]').val(biolink_block_id);
});

$('form[name="biolink_block_delete"]').on('submit', event => {

    event.preventDefault();
    let biolink_block_id = $(event.currentTarget).find('input[name="biolink_block_id"]').val();

    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            let notification_container = $(event.currentTarget).find('.notification-container');
            notification_container.html('');

            if (data.status == 'error') {
                // display_notifications(data.message, 'error', notification_container);
            } else if (data.status == 'success') {

                /* Clear input values */
                $(event.currentTarget).find('input[name="biolink_block_id"]').val('');

                // display_notifications(data.message, 'success', notification_container);

                setTimeout(() => {
                    /* Hide modal */
                    $('#biolink_block_delete').modal('hide');

                    redirect(data.url, true);

                }, 1000);

            }
        },
        dataType: 'json'
    });


})

$('form[name="create_biolink_image"]').on('submit', event => {

    event.preventDefault()
    let form = $(event.currentTarget)[0];
    let data = new FormData(form);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        url: '/biolink-block-ajax',
        data: data,
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})
$('form[name="create_biolink_youtube"]').on('submit', event => {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_soundcloud"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})


$('form[name="create_biolink_vimeo"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_text"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_mail"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})


$('form[name="create_biolink_spotify"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_twitch"]').on('submit', event => {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_instagram_media"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_applemusic"]').on('submit', event => {
    event.preventDefault()
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

$('form[name="create_biolink_twitter_tweet"]').on('submit', event => {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/biolink-block-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            if (data.status == 'error') {

                let notification_container = $(event.currentTarget).find('.notification-container');

                notification_container.html('');

                display_notifications(data.message, 'error', notification_container);

            } else if (data.status == 'success') {

                /* Fade out refresh */
                fade_out_redirect({ url: data.url, full: true });

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})

/* On modal show load new data */
$('#link_delete').on('show.bs.modal', event => {
    let link_id = $(event.relatedTarget).data('link-id');

    $(event.currentTarget).find('input[name="link_id"]').val(link_id);
});

$('form[name="link_delete"]').on('submit', event => {
    let link_id = $(event.currentTarget).find('input[name="link_id"]').val();

    $.ajax({
        type: 'POST',
        url: '/link-ajax',
        data: $(event.currentTarget).serialize(),
        success: (data) => {
            let notification_container = $(event.currentTarget).find('.notification-container');
            notification_container.html('');

            if (data.status == 'error') {
                display_notifications(data.message, 'error', notification_container);
            } else if (data.status == 'success') {

                /* Clear input values */
                $(event.currentTarget).find('input[name="link_id"]').val('');

                display_notifications(data.message, 'success', notification_container);

                setTimeout(() => {
                    /* Hide modal */
                    $('#link_delete').modal('hide');

                    redirect(data.url, true);

                }, 1000);

            }
        },
        dataType: 'json'
    });

    event.preventDefault();
})