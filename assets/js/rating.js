$(document).ready(function () {
    if (typeof $(document).jRate != 'undefined' && $.isFunction($(document).jRate) && typeof $("#star") != 'undefined') {
        var rated = $("#star").jRate({
            rating: rating,
            startColor: "#77C282",
            endColor: "#77C282",
            count: 10,
            max: 10,
            precision: 1,
            readOnly: true,
            width: 25,
            height: 25,
            shapeGap: '2px',
            backgroundColor: '#888888',
        });
        $("#star-vote").jRate({
            rating: 0,
            startColor: "#77C282",
            endColor: "#77C282",
            count: 10,
            max: 10,
            precision: 1,
            width: 25,
            height: 25,
            shapeGap: '10px',
            backgroundColor: '#888888',
            onSet: function (rating) {
                $.ajax({
                    url: URL_POST_AJAX,
                    type: 'POST',
                    data:{
                        action: "ratemovie",
                        rating: rating,
                        postid: GET_POST_ID,
                    },
                }).done(function (data) {
                    if (data.status == true) {
                        refresh_rating = data.rating_star;
                        $("#star-vote").empty().jRate({
                            rating: rating,
                            count: 10,
                            max: 10,
                            precision: 1,
                            readOnly: true,
                            width: 25,
                            height: 25,
                            shapeGap: '10px',
                        });
                        $("#star").empty().jRate({
                            rating: refresh_rating,
                            startColor: "#77C282",
                            endColor: "#77C282",
                            count: 10,
                            max: 10,
                            precision: 1,
                            readOnly: true,
                            width: 25,
                            height: 25,
                            shapeGap: '2px',
                            backgroundColor: '#888888',
                        });
                        $('.rated-text').html('(' + data.rating_count + ' Đánh giá)');
                    } else {
                    }
                }).fail(function () {
                    console.log('error-connection');
                });
            }
        });
    }
});
