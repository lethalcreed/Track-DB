document.getElementById('search').addEventListener('input', function (e) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/search',
        // dataType: 'JSON',
        data: {inputData: e.target.value},
        success: function (data) {
            console.log("Ajax request passed");
            AppendTracks(data);
        }
    })
});

function AppendTracks(tracks) {
    var Row = document.getElementsByClassName('overview');

    console.log(tracks['tracks']);

    if (tracks['tracks'].length == 0) {
        ClearTracks();
        var empty = document.createElement("DIV");
        empty.className = 'track';
        empty.innerHTML = 'No results found';
        Row[0].appendChild(empty);

    } else {
        ClearTracks();
        for (var i = 0; i < tracks['tracks'].length; i++) {
            var br = document.createElement("BR");
            var track = document.createElement("DIV");
            track.className = 'col-md-4 track';

            var a = document.createElement("a");
            a.href = "{{Route('track.detail')}}?id={{" + tracks['tracks'][i]['id'] + "}}";

            var img = document.createElement("img");
            img.src = tracks['tracks'][i]['cover'];
            img.height = "100%";
            img.width = "100%";

            a.appendChild(img);


            if (tracks['tracks'][i]['remix'] == '') {
                track.appendChild(a);
                track.appendChild(br);
                track.innerHTML = tracks['tracks'][i]['artist'] + ' - ' + tracks['tracks'][i]['title'];
                track.appendChild(br);
                track.appendChild(br);
            } else {
                track.appendChild(a);
                track.appendChild(br);
                track.innerHTML = tracks['tracks'][i]['artist'] + ' - ' + tracks['tracks'][i]['title'] + tracks['tracks'][i]['remix'];
            }
            Row[0].appendChild(track)
        }
    }
}

function ClearTracks(){
    var ExistingTracks = document.getElementsByClassName('track');
    for (var e = 0; e < ExistingTracks.length; e++) {
        ExistingTracks[e].remove();
    }
}
