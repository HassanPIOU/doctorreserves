@extends('layouts.layout')
@section('content')
    <style>
        .background {
            padding: 0 25px 25px;
            position: relative;
            width: 100%;
        }


        @media (min-width: 900px) {
            .background {
                padding: 0 0 25px;
            }
        }

        .container {
            margin: 0 auto;
            padding: 50px 0 0;
            max-width: 960px;
            width: 100%;
        }

        .panel {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px 25px;
            position: relative;
            width: 100%;
            z-index: 10;
        }

        .pricing-table {
            box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.09), 0px 8px 20px 7px rgba(0, 0, 0, 0.02);
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 900px) {
            .pricing-table {
                flex-direction: row;
            }
        }

        .pricing-table * {
            text-align: center;
            text-transform: uppercase;
        }

        .pricing-plan {
            border-bottom: 1px solid #e1f1ff;
            padding: 25px;
        }

        .pricing-plan:last-child {
            border-bottom: none;
        }

        @media (min-width: 900px) {
            .pricing-plan {
                border-bottom: none;
                border-right: 1px solid #e1f1ff;
                flex-basis: 100%;
                padding: 25px 50px;
            }

            .pricing-plan:last-child {
                border-right: none;
            }
        }

        .pricing-img {
            margin-bottom: 25px;
            max-width: 100%;
        }

        .pricing-header {
            color: #888;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .pricing-features {
            color: #016FF9;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 20px 0 0px;
        }

        .pricing-features-item {
            list-style: none;
            border-top: 1px solid #e1f1ff;
            font-size: 12px;
            line-height: 1.5;
            padding: 15px 0;
            margin-left: -50px !important;
        }

        .pricing-features-item:last-child {
            border-bottom: 1px solid #e1f1ff;
        }

        .pricing-price {
            color: #016FF9;
            display: block;
            font-size: 32px;
            font-weight: 700;
        }

        .pricing-button {
            border: 1px solid #9dd1ff;
            border-radius: 10px;
            color: #348EFE;
            display: inline-block;
            margin: 25px 0;
            padding: 15px 35px;
            text-decoration: none;
            transition: all 150ms ease-in-out;
        }

        .pricing-button:hover,
        .pricing-button:focus {
            background-color: #e1f1ff;
        }

        .pricing-button.is-featured {
            background-color: #48aaff;
            color: #fff;
        }

        .pricing-button.is-featured:hover,
        .pricing-button.is-featured:active {
            background-color: #269aff;
        }
    </style>


    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Plan tarifaire</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{env('APP_NAME')}}</a></li>
                            <li class="breadcrumb-item active">Paramètre</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-3 col-lg-4">
                    <div class="background">
                        <div class="container">
                            <div class="panel pricing-table">
                                <div class="pricing-plan">
                                    <img src="https://s21.postimg.cc/tpm0cge4n/space-ship.png" alt="" class="pricing-img">
                                    <h2 class="pricing-header">Premium</h2>
                                    <ul class="pricing-features">
                                        <li class="pricing-features-item">Rendez-vous</li>
                                        <li class="pricing-features-item">Calendrier</li>
                                        <li class="pricing-features-item">Historique</li>
                                        <li class="pricing-features-item">Festion des patients</li>
                                    </ul>
                                    <span class="pricing-price">20 €</span>
                                    <div id="paypal-button" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>



    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

@endsection