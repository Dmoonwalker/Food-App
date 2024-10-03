// events.js

// Initialize event handlers for user interactions on the page
function initEventHandlers() {
    // Toggle visibility of the navigation menu when toggle-button is clicked
    $('.toggle-button').click(function() {
        $('.nav-links').toggleClass('active');
    });

    // When 'Select All' button is clicked, check all video checkboxes
    $('#selectAllButton').on('click', function() {
        $('.video-checkbox').prop('checked', true);  // Check all checkboxes
    });

    // Event listener for the download selected button
    $('#downloadSelectedButton').on('click', function() {
        let selectedVideos = getSelectedVideos();  // Get selected videos
        
        if (selectedVideos.length > 0) {
            showProgress('Downloading Selected...', true);  // Show progress message
            processVideoDownloads(selectedVideos);  // Start download process
        } else {
            showProgress('No Videos Selected');  // Show message if no videos selected
        }
    });

    // Handle playlist form submission
    $('#downloadForm').on('submit', function(event) {
        event.preventDefault();  // Prevent default form submission
        var formData = $(this).serialize();  // Serialize form data
        toggleInputSection(false);  // Hide input section
        showProgress('Fetching Playlist...', true);  // Show progress message
        
        // Fetch playlist data
        fetchPlaylist(formData, function(response) {
            videoDetails = response.video_details;  // Assign received video details
           
            showProgress('Playlist Ready', false);  // Show message when ready
            displayVideoDetails(videoDetails);  // Display video details on the UI
        }, function(response) {
            showProgress(response.responseJSON.error || 'Download Failed', false);  // Handle error
            toggleInputSection(true);  // Show input section again
           
        });
    });

    // Event handler for individual video download button
    $('#video-list').on('click', '.download-button', function() {
        let index = $(this).data('video-index');  // Get the index of clicked video
        let videoId = videoDetails[index].id;  // Get the video ID
        let format = $(`#format-${index}`).val();  // Get the selected format
        let quality = $(`#quality-${index}`).val();  // Get the selected quality
        
        updateButtonStatus(index, true);  // Update the button status to downloading
        showProgress('Downloading', true);  // Show progress message
        
        // Call to download the selected video
        downloadVideo(videoId, format, quality, function(response) {
            var link = document.createElement('a');
            link.href = response.file_url;  // Video download link
            link.download = response.file_url.split('/').pop();  // Set download filename
            link.click();  // Trigger the download
            updateButtonStatus(index, false, true);  // Update button status when done
            showProgress('Downloaded', false);  // Show download completion message
        }, function(response) {
            showProgress(response.responseJSON.error || 'Download Failed', false);  // Handle download failure
            toggleInputSection(true);  // Re-enable inputs
            hideProgress();
        });
    });

    // Reload page when convert next button is clicked
    $('#convertNextButton').on('click', function() {
        location.reload();  // Reload the current page
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
