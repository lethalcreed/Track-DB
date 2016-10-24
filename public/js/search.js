//      Search functionality

window.addEventListener('input', function () {
        var searchInput = document.getElementById('search');
        var tagInput = document.getElementById('genre');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/search',
            dataType: 'JSON',
            data: {searchInput: searchInput.value, tagInput: tagInput.value},
            success: function (data) {
                console.log(data);
                console.log("Ajax call passed");
                $('#overview').html('');
                for (var i = 0; i < data.tracks.length; i++) {
                    console.log(data.tracks[i]);
                    if (data.tracks[i].remix == '') {
                        $('#overview').append(
                            '<div class="col-md-4">' +
                            '<a href="' +
                            '/detail?id=' +
                            data.tracks[i].id +
                            '">' +
                            '<img src="' +
                            data.tracks[i].cover +
                            '" height="100%" width="100%">' +
                            '</a>' +

                            '<br>' +
                            data.tracks[i].artist +
                            ' - ' +
                            data.tracks[i].title +
                            '<br>' +
                            '<br>' +
                            '</div>'
                        );
                    } else {
                        $('#overview').append(
                            '<div class="col-md-4">' +
                            '<a href="' +
                            'detail?id=' +
                            data.tracks[i].id +
                            '">' +
                            '<img src="' +
                            data.tracks[i].cover +
                            '" height="100%" width="100%">' +
                            '</a>' +

                            '<br>' +
                            data.tracks[i].artist +
                            ' - ' +
                            data.tracks[i].title +
                            data.tracks[i].remix +
                            '</div>'
                        )
                    }
                }
            }
        });
    }, false
);