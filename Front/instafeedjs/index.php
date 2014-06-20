<script type="text/javascript" src="instafeed.min.js"></script>
<script type="text/javascript" src="jquery.jscroll.min.js"></script>
<script type="text/javascript">

//    var loadButton = document.getElementById('load-more');

    var feed = new Instafeed({
        get: 'location',
        tagName: '360SPORTSBAR',
        distance: 100,
        clientId: '5c2824eae621413cb4afb5ff4e650913',
        locationId: 303192746,
        sortBy: 'most-recent',
        limit: 35,
        accessToken: '1322529869.5c2824e.ac0d6b9734274630909749e6843cdf5c',
        template: '\
                    <li>\n\
                            <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>\n\
                            <div class="timeline-panel">\n\
                                \n\
                                <div class="timeline-heading">\n\
                                    <h4 class="timeline-title">{{caption}}</h4>\n\
                                </div>\n\
                                \n\
                                <div class="timeline-body">\n\
                                    <p><a href="{{link}}"><img src="{{image}}" /></a></p>\n\
                                </div>\n\
                            </div>\n\
                    </li>\n',
//        after: function() {
//            // disable button if no more results to load
//            if (!this.hasNext()) {
//                loadButton.setAttribute('disabled', 'disabled');
//            }
//        },
        success: function() {

        }
    });


    // bind the load more button
//    loadButton.addEventListener('click', function() {
//        feed.next();
//    });


    feed.run();

//timeline source http://bootsnipp.com/snippets/featured/timeline-responsive
//proximidades https://api.instagram.com/v1/locations/search?lat=-20.823323&lng=-49.3975257&access_token=1322529869.5c2824e.ac0d6b9734274630909749e6843cdf5c
//gerenciar clientes http://instagram.com/developer/clients/manage/?edited=360sportsbar
//get access token: http://jelled.com/instagram/access-token

//  token:  http://localhost/#access_token=1322529869.5c2824e.ac0d6b9734274630909749e6843cdf5c
</script>


<ul  id="instafeed" class="timeline">
    <li>
<!--        <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
            </div>
            <div class="timeline-body">
                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
        </div>
    </li>
    <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
            </div>
        </div>
        -->
    </li>
</ul>

<style>
    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }

    .timeline > li:after {
        clear: both;
    }

    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }

    .timeline > li:after {
        clear: both;
    }

    .timeline > li > .timeline-panel {
        width: 43%;
        float: left;
        border: 1px solid #d4d4d4;
        border-radius: 2px;
        padding: 20px;
        position: relative;
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }

    .timeline > li > .timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #ccc;
        border-right: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        content: " ";
    }

    .timeline > li > .timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }

    .timeline > li > .timeline-badge {
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 1.4em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 50%;
        margin-left: -25px;
        background-color: #999999;
        z-index: 100;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
    }

    .timeline > li:nth-child(odd) > .timeline-panel {
        float: right;
    }

    .timeline > li:nth-child(odd) > .timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline > li:nth-child(odd) > .timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }

    .timeline-badge.primary {
        background-color: #2e6da4 !important;
    }

    .timeline-badge.success {
        background-color: #3f903f !important;
    }

    .timeline-badge.warning {
        background-color: #f0ad4e !important;
    }

    .timeline-badge.danger {
        background-color: #d9534f !important;
    }

    .timeline-badge.info {
        background-color: #5bc0de !important;
    }

    .timeline-title {
        margin-top: 0;
        color: inherit;
    }

    .timeline-body > p,
    .timeline-body > ul {
        margin-bottom: 0;
    }

    .timeline-body > p + p {
        margin-top: 5px;
    }

    @media (max-width: 767px) {
        ul.timeline:before {
            left: 40px;
        }

        ul.timeline > li > .timeline-panel {
            width: calc(100% - 90px);
            width: -moz-calc(100% - 90px);
            width: -webkit-calc(100% - 90px);
        }

        ul.timeline > li > .timeline-badge {
            left: 15px;
            margin-left: 0;
            top: 16px;
        }

        ul.timeline > li > .timeline-panel {
            float: right;
        }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
    }
</style>


<?php
