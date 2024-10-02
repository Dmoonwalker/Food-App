// events.js

function initEventHandlers() {
    $('.toggle-button').click(function() {
        $('.nav-links').toggleClass('active');
    });
    $('#selectAllButton').on('click', function() {
        $('.video-checkbox').prop('checked', true);
    });

   
$('#commentForm').on('submit', function(event) {
    event.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: '/comments',
        method: 'POST',
        data: formData,
        success: function(response) {
            $('#commentsList').prepend(renderComment(response.comment));
            $('#commentText').val('');
        },
        error: function(response) {
            alert('Failed to post comment. Please try again.');
        }
    });
});
// Handle download selected button click
$('#downloadSelectedButton').on('click', function() {
    let selectedVideos = getSelectedVideos();

    if (selectedVideos.length > 0) {
        showProgress('Downloading selected...', true);
        processVideoDownloads(selectedVideos);
    } else {
        showProgress('No videos selected');
    }
});
function getSelectedVideos() {
    let selectedVideos = [];
    $('.video-checkbox:checked').each(function() {
        let index = $(this).data('video-index');
        selectedVideos.push(videoDetails[index].id);
    });
    return selectedVideos;
}

    // Handle form submission to fetch playlist
    $('#downloadForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        toggleInputSection(false);
        showProgress('Fetching playlist...', true);
        format = $('#format').val();  // Extract format directly
        quality = $('#quality').val();  
        fetchPlaylist(formData, function(response) {
            videoDetails = response.video_details;
            showProgress('Playlist Ready', false);
            displayVideoDetails(videoDetails);
   
        }, function(response) {
            showProgress(response.responseJSON.error || 'Download Failed', false);
            toggleInputSection(true);
            hideProgress();
        });
    });

    // Handle individual video download button click
    $('#video-list').on('click', '.download-button', function() {
        let index = $(this).data('video-index');
        let videoId = videoDetails[index].id;
        let format = $(`#format-${index}`).val();
        let quality = $(`#quality-${index}`).val();
        updateButtonStatus(index, true);
        showProgress('Downloading', true);
        downloadVideo(videoId, format,quality,function(response) {
            var link = document.createElement('a');
            link.href = response.file_url;
            link.download = response.file_url.split('/').pop();
            link.click();
            updateButtonStatus(index, false, true);
            showProgress('Downloaded', false);
        }, function(response) {
            showProgress(response.responseJSON.error || 'Download Failed', false);
            toggleInputSection(true);
            hideProgress();
        });
    });

    
    // Handle convert next button click
    $('#convertNextButton').on('click', function() {
        location.reload();
    });
}
$(document).ready(function() {
    $('#pasteButton').click(function() {
        if (navigator.clipboard && navigator.clipboard.readText) {
            navigator.clipboard.readText().then(function(text) {
                $('#playlist_url').val(text);
                // Hide the paste button after successful paste
                $('#pasteButton').hide();
            }).catch(function(err) {
                console.error('Failed to read clipboard contents: ', err);
                alert('Failed to read clipboard contents. Please allow clipboard access.');
            });
        } else {
            alert('Clipboard API not supported or permission denied.');
        }
    });

    // Show the paste button again when the input field is cleared
    $('#playlist_url').on('input', function() {
        if ($(this).val() === '') {
            $('#pasteButton').show();
        }
    });
});
