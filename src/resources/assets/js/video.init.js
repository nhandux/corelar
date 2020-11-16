// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 2. Ajax get id video
$('.content-video .table td a.link').on('click', function () {
    var list_id = $(this).data("id");

    // console.log(list_id);
    var request = $.ajax({
        url: "/admin/content/video/" + list_id + "/get-content",
        method: "GET",
        // dataType: "json"
    });

    request.done(function (msg) {

        var previewModal = document.getElementById('previewModal');

        $('#previewModal').modal('show');

        var video_url_id = msg.video_id;

        let video_details = msg.video_details;
        let endSub = [];
        console.log(video_details);
        $.each(video_details, function (index, value) {
            if (index == 0) {
                beginVideo = convert(value.begin_at);
            }
            start = convert(value.begin_at);
            time = convert(value.end_at);

            if (index === 0) {
                $('#id_quiz').val(value.id);
                $('#sub_quiz').val(value.has_quiz === 'Y' ? 1 : '');
            }
            endSub.push(time);
            let html = '<div class="swiper-slide" data-start-sub="' + start + '" data-end-sub="' + time + '">' +
                '<div class="preview-wrapper__sub--contennt">' +
                '<p class="sub-kr" data-id="' + value.id + '" data-quiz="' + value.has_quiz + '">' + value.sub + '</p>' +
                '<p class="sub-en">' + (value.video_detail_en.sub != null ? value.video_detail_en.sub : '') + '</p>' +
                '<p class="sub-vi">' + (value.video_detail_vi.sub != null ? value.video_detail_vi.sub : '') + '</p>' +
                '<p class="sub-id">' + (value.video_detail_id.sub != null ? value.video_detail_id.sub : '') + '</p>' +
                '<button class="btn switch-sub switch-sub--en">KR/EN</button>' +
                '<button class="btn switch-sub switch-sub--vi">KR/VI</button>' +
                '<button class="btn switch-sub switch-sub--id">KR/ID</button>' +
                '</div>' +
                '</div>';

            $('#showDataSub').append(html);

            $('#begin_video').val(beginVideo);
            $('#end_video').val(time);
        });

        $('#end_sub').attr('data-end-sub', endSub);

        $('#end_sub span').text('');
        $('#end_sub span').text(endSub[0]);

        previewModal.addEventListener('shown.coreui.modal', function (e) {
            // console.log('msg ' + msg);
            $(".preview-wrapper__video").html('');
            $(".preview-wrapper__video").append('<div id="movie_player" data-video-id="' + video_url_id + '"></div>')

            onYouTubeIframeAPIReady(video_url_id);

            slideSubVideo();

            var begin_video = $('#begin_video').val();
            document.getElementById("playerWrap").addEventListener("click", function () {
                player.seekTo(begin_video);
                swiperPreview.slideTo(0, 1000, false)
                document.getElementById("playerWrap").classList.remove("shown");
            });
        });
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });

});

function convert(time) {
    time = time.split(':');
    let convert = 0;

    if (time.length == 3) {
        convert = Number(time[0]) * 3600 + Number(time[1]) * 60 + Number(time[2]);
    } else {
        convert = Number(time[0]) * 60 + Number(time[1]);
    }

    return convert;
}

$('#formSubmitQuiz').on('submit', function () {
    let formData = new FormData($(this)[0]);

    $.ajax({
        url: '/admin/content/video/change-quiz',
        type: "POST",
        contentType: false,
        processData: false,
        data: formData
    }).done(function (res) {
        let quiz = $('#sub_quiz').val();
        $('.swiper-slide-active').find('.sub-kr').attr('data-quiz', Number(quiz) === 1 ? 'Y' : 'N');
        $('.preview-wrapper__info--alert').show();
        setTimeout(function () {
            $('.preview-wrapper__info--alert').slideUp();
        }, 2000);

    }).fail(function (err) {
        alert('error data change quiz');
    });

    return false;
});

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
var videotime = 0;

function onYouTubeIframeAPIReady(id) {
    var begin_video = $('#begin_video').val(),
        end_video = $('#end_video').val();

    if (begin_video) {
        videotime = begin_video;
    }

    player = new YT.Player('movie_player', {
        videoId: id,
        playerVars: {
            'autoplay': 0,
            'start': videotime,
            'end': end_video,
            'controls': 0,
            'disablekb': 1,
            'cc_load_policy': 1,
            'enablejsapi': 1,
            'iv_load_policy': 0,
            'modestbranding': 1,
            'playsinline': 1,
            'theme': 'light'
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.pauseVideo();

    function updateTime() {
        var oldTime = videotime,
            objEndSub = $('#end_sub').attr("data-end-sub").split(','),
            l = objEndSub.length;

        for (var i = 0; i < l; i++) {

            if (oldTime < objEndSub[i]) {
                $('#end_sub span').text('');
                $('#end_sub span').text(objEndSub[i]);
                break;
            }
        }

        if (player && player.getCurrentTime) {
            videotime = player.getCurrentTime();

            // console.log(videotime);
            document.getElementById("current-time").innerHTML = videotime;
        }

        if (videotime !== oldTime) {
            onProgress(videotime);
        }
    }
    timeupdater = setInterval(updateTime, 100);
}

// when the time changes, this will be called.
function onProgress(currentTime) {
    let currentTimeF = parseFloat(currentTime),
        objEndSub = $('#end_sub').attr("data-end-sub").split(','),
        valCurEndSub = parseFloat($('#end_sub span').text()),
        l = objEndSub.length;

    if (currentTimeF >= valCurEndSub) {
        for (let i = 0; i < l; i++) {
            let val = parseFloat(objEndSub[i]);

            if (i + 1 == l) {
                break;
            }

            if (val === valCurEndSub) {
                $('#end_sub span').text(objEndSub[i + 1]);
                goToPage(i + 1);
            }
        }
    }
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        document.getElementById("playerWrap").classList.add("shown");
    }
}



/**** Swiper JS****/

if (typeof Swiper !== 'undefined') {
    var swiperPreview;

    function slideSubVideo() {
        swiperPreview = new Swiper('.preview-wrapper__sub', {
            slidesPerView: 1,
            allowTouchMove: false,
            // effect: 'fade',
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                slideChange: function () {

                },
                transitionEnd: function () {
                    // Get quiz
                    let id = $('.swiper-slide-active').find('.sub-kr').attr('data-id');
                    let quiz = $('.swiper-slide-active').find('.sub-kr').attr('data-quiz');
                    quiz = quiz === 'Y' ? 1 : '';

                    $('#sub_quiz').val(quiz);
                    $('#id_quiz').val(id);
                }
            }
        });

        contentSubVideo();
    }

    previewModal.addEventListener('hidden.coreui.modal', function (e) {
        // player.removeEventListener('onReady', 'onPlayerReady');
        player.destroy();
        $('#end_sub span').text('');
        swiperPreview.removeAllSlides();
    });

    /**** Content Sub ****/

    $('.swiper-btn').on('click', function () {
        document.getElementById("playerWrap").classList.remove("shown");
        swiperPreview.on('slideChangeTransitionEnd', function () {
            // Video seekTo with conent Sub
            timeStartSub = $('.swiper-slide-active').data("startSub");
            timeEndSub = $('.swiper-slide-active').data("endSub");
            $('#end_sub span').text('');
            $('#end_sub span').text(timeEndSub);
            player.seekTo(timeStartSub);
        });
    });

    function contentSubVideo() {
        let subEN = $('.sub-en'),
            subVI = $('.sub-vi'),
            subID = $('.sub-id'),

            btnEN = $('.switch-sub--en'),
            btnVI = $('.switch-sub--vi'),
            btnID = $('.switch-sub--id');

        subEN.show();
        subVI.hide();
        subID.hide();

        btnEN.show();
        btnVI.hide();
        btnID.hide();

        $(btnEN).click(function () {
            subEN.hide();
            subVI.show();
            subID.hide();

            btnEN.hide();
            btnVI.show();
            btnID.hide();
        });

        $(btnVI).click(function () {
            subEN.hide();
            subVI.hide();
            subID.show();

            btnEN.hide();
            btnVI.hide();
            btnID.show();
        });

        $(btnID).click(function () {
            subEN.show();
            subVI.hide();
            subID.hide();

            btnEN.show();
            btnVI.hide();
            btnID.hide();
        });
    }
}

// Go to slider
function goToPage(numberPage) {
    swiperPreview.slideTo(numberPage, 500, false)
}