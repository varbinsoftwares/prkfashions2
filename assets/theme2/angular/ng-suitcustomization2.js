


App.controller('customizationShirt', function ($scope, $http, $location, $filter) {
    $scope.fabricurl = "http://api.octopuscart.com/output/";
    var currencyfilter = $filter('currency');

    var globlecart = baseurl + "customApi/cartOperationSingle/" + product_id + "/" + gcustome_id;
    $scope.product_quantity = 1;


    $scope.cartFabrics1 = [
        {"sku": "AM697"},
        {"sku": "AM661"},
        {"sku": "AM64A"},
        {"sku": "WF81"},
        {"sku": "D1576"},
        {"sku": "L884"}
    ];


    $scope.cartFabrics = [];





    $scope.shirtimplement = function () {
        for (i in $scope.cartFabrics) {
            var fb = $scope.cartFabrics[i];
            $scope.selecteElements[fb.product_id] = {'sleeve': ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png", ],
                'collar_buttons': 'buttonsh1.png',
                'show_buttons': 'true',
                "Monogram Initial": "ABC",
                "Collar Insert": "No",
                "Collar Insert Full": "No",
                "Cuff Insert": "No",
                "Cuff Insert Full": "No",
                "Monogram ColorBack": "White-Black",
                "Monogram Color": "white",
                "Monogram Background": "black",
                "Monogram Style": "Style 1",
                "summary": {},
            };
        }
        var viewtype = "front";
        switch (defaut_view) {
            case "Jacket":
                viewtype = "front";
                break;
            case "Pant":
                viewtype = "pant";
                break;
            case "TuxedoPant":
                viewtype = "pant";
                break;
            default:
                viewtype = "front";
        }


        $scope.screencustom = {
            'view_type': viewtype,
            "fabric": $scope.cartFabrics[0].product_id,
            "productobj": $scope.cartFabrics[0],
            "sku": $scope.cartFabrics[0].sku,
        };
        var url = baseurl + "customApi/customeElements" + defaut_view;
        $http.get(url).then(function (rdata) {
            $scope.data_list = rdata.data.data;
            $scope.cuff_collar_insert = rdata.data.cuff_collar_insert;
            $scope.keys = rdata.data.keys;
            $scope.monogram_colors = rdata.data.monogram_colors;
            $scope.monogram_style = rdata.data.monogram_style;
            $scope.category_item($scope.data_list[$scope.keys[0]])
            $scope.parents = 'Body Fit';
            for (i in $scope.keys) {
                var temp = $scope.data_list[$scope.keys[i].title];
                console.log(temp);
                for (j in temp) {
                    if (temp[j]['status'] == 1) {
                        for (f in $scope.cartFabrics) {
                            var fb = $scope.cartFabrics[f];
                            console.log(fb.product_id, temp[j], $scope.keys[i].title);
                            $scope.selecteElements[fb.product_id][$scope.keys[i].title] = temp[j];
                            $scope.selecteElements[fb.product_id]['summary'][$scope.keys[i].title] = temp[j].title;
                        }
                    }
                }
            }


            setTimeout(function () {


                //zoom plugin

                $(document).on('mousemove', '.frame', function () {

                    var element = {
                        width: $(this).width(),
                        height: $(this).height()
                    };

                    var mouse = {
                        x: event.pageX,
                        y: event.pageY
                    };

                    var offset = $(this).offset();

                    var origin = {
                        x: (offset.left + (element.width / 2)),
                        y: (offset.top + (element.height / 2))
                    };

                    var trans = {
                        left: (origin.x - mouse.x) / 2,
                        down: (origin.y - mouse.y) / 2
                    };

                    var transform = ("scale(2,2) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");

                    $(this).children(".zoom").css("transform", transform);

                });

                $(document).on('mouseleave', '.frame', function () {
                    $(this).children(".zoom").css("transform", "none");
                });

                //end of zoom

            }, 1500)


        });
    }


    $scope.show_shirt = function (shirtstyle) {
        $scope.screencustom.style_select = shirtstyle;
    }


    $scope.fabricCartData = {};//cart data

    $scope.getCartDataFabric = function () {
        $http.get(globlecart).then(function (rdata) {
            console.log(rdata.data)
            $scope.fabricCartData = [rdata.data];
            $scope.cartFabrics = [rdata.data];
            console.log($scope.fabricCartData)
            $scope.fabricCartData['grand_total'] = $scope.fabricCartData['total_price'];

            $scope.shirtimplement()
        }, function (r) {
        })
    }
    $scope.getCartDataFabric();






//shirt implementation

    $scope.parents = 'Body Fit';
    $scope.selecteElements = {};



    $scope.category_item = function (rdata, parents) {
        $scope.selectedProfile = "";
        $scope.parents = parents;
        $scope.category_data = rdata;
    }

//end of shirt implemantation

    setTimeout(function () {
        $('.images-slider').flexslider({
            animation: "fade",
            controlNav: "thumbnails"
        });


        //zoom plugin

        $(document).on('mousemove', '.frame', function () {

            var element = {
                width: $(this).width(),
                height: $(this).height()
            };

            var mouse = {
                x: event.pageX,
                y: event.pageY
            };

            var offset = $(this).offset();

            var origin = {
                x: (offset.left + (element.width / 2)),
                y: (offset.top + (element.height / 2))
            };

            var trans = {
                left: (origin.x - mouse.x) / 2,
                down: (origin.y - mouse.y) / 2
            };

            var transform = ("scale(2,2) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");

            $(this).children(".zoom").css("transform", transform);

        });

        $(document).on('mouseleave', '.frame', function () {
            $(this).children(".zoom").css("transform", "none");
        });

        //end of zoom

    }, 500)





    //select fabric
    $scope.selectFabric = function (fabric) {
        $scope.screencustom.fabric = fabric.folder;
        $scope.screencustom.productobj = fabric;
    }
    //


    $scope.monogramSetting = function () {
        if ($scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title != 'No') {
            var monoposition = $scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title;
            var monograminit = $scope.selecteElements[$scope.screencustom.fabric]['Monogram Initial'];
            var monocolor = $scope.selecteElements[$scope.screencustom.fabric]['Monogram ColorBack'];
            var monostyle = $scope.selecteElements[$scope.screencustom.fabric]['Monogram Style']
            $scope.selecteElements[$scope.screencustom.fabric]['summary']['Monogram'] = [monoposition, monograminit, monocolor, monostyle].join(", ");
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['summary']['Monogram'] = "No";
        }
    }


    //collar cuff summary setting

    $scope.collarCuffSetting = function () {
        //collar insert
        var collar = $scope.selecteElements[$scope.screencustom.fabric]['Collar'];
        var collarinsert = $scope.selecteElements[$scope.screencustom.fabric]['Collar Insert'];
        var collarinsertfull = $scope.selecteElements[$scope.screencustom.fabric]['Collar Insert Full'];
        collarinsert = collarinsert == 'No' ? '' : ", " + collarinsert;
        collarinsertfull = collarinsertfull == 'No' ? '' : ", " + collarinsertfull;
        $scope.selecteElements[$scope.screencustom.fabric]['summary']['Collar'] = collar.title + collarinsert + collarinsertfull;
        //

        //cuff insert
        var cuffsleeve = $scope.selecteElements[$scope.screencustom.fabric]['Cuff & Sleeve'];
        var cuffinsert = $scope.selecteElements[$scope.screencustom.fabric]['Cuff Insert'];
        var cuffinsertfull = $scope.selecteElements[$scope.screencustom.fabric]['Cuff Insert Full'];
        cuffinsert = cuffinsert == 'No' ? '' : ", " + cuffinsert;
        cuffinsertfull = cuffinsertfull == 'No' ? '' : ", " + cuffinsertfull;
        $scope.selecteElements[$scope.screencustom.fabric]['summary']['Cuff & Sleeve'] = cuffsleeve.title + cuffinsert + cuffinsertfull;
        //
    }


    //monogram style color
    $scope.monogramColor = function (monoobj) {
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Background'] = monoobj.backcolor;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Color'] = monoobj.color;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram ColorBack'] = monoobj.title;

        $scope.monogramSetting();
    }

    $scope.monogramFont = function (mfobj) {
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Font'] = mfobj;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Style'] = mfobj.title;
        $scope.monogramSetting();
    }

    // monogram style 


    $scope.selectElement = function (obj, element) {
        console.log(element)

        $scope.screencustom.view_type = obj.viewtype;
        $scope.selecteElements[$scope.screencustom.fabric][obj.title] = element;
        $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title;
        if (obj.title == 'Cuff & Sleeve') {
            $scope.selecteElements[$scope.screencustom.fabric].sleeve = element.sleeve;

        }
        if (obj.title == 'Collar') {
            $scope.selecteElements[$scope.screencustom.fabric].collar_buttons = element.buttons;
        }
        if (obj.title == 'Front') {
            $scope.selecteElements[$scope.screencustom.fabric].show_buttons = element.show_buttons;
        }
        if (element.monogram_change_css) {
            if ($scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title != 'No') {
                $scope.selecteElements[$scope.screencustom.fabric]['Monogram'] = element.monogram_position;
            }
        }

//        $("html, body").animate({scrollTop: 0}, "slow")
    }

    $scope.pullUp = function () {
        $("html, body").animate({scrollTop: 0}, "slow")
    }


    $scope.laple_button_hole_contrast = function (insfab) {

        $scope.selecteElements[$scope.screencustom.fabric]['Contrast Lapel Button Hole'] = insfab;

    }

    $scope.sleeve_button_hole_contrast = function (insfab) {

        $scope.selecteElements[$scope.screencustom.fabric]['Button Thread'] = insfab;

    }


    $scope.selectCollarCuffInsertType = function (cctype, insfab) {
        $scope.selecteElements[$scope.screencustom.fabric][cctype] = insfab;
        $scope.collarCuffSetting();
    }


    $scope.rotateModel = function () {
        if ($scope.screencustom.view_type == "front") {
            $scope.screencustom.view_type = "back";
        }
        else {
            $scope.screencustom.view_type = "front";
        }
    }

    $scope.changeViews = function (viewtype) {

        $scope.screencustom.view_type = viewtype;

    }

    //add to cart
    $scope.addToCartCustome = function () {
        var summerydata = $scope.selecteElements[product_id].summary;
        var customhtmlarray = [];
        var form = new FormData()
        for (i in summerydata) {
            var ks = i;
            var kv = summerydata[i];
            form.append("customekey[]", ks);
            form.append("customevalue[]", kv);
            console.log(ks, kv);
            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
            customhtmlarray.push(summaryhtml);
        }
        ;
        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table>" + customhtmlarray + "</table></div>"

        swal({
            title: 'Confirm Design',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Add To Cart',
            cancelButtonText: 'Cancel',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            html: customdiv,
            preConfirm: function () {

                swal({
                    title: 'Adding to Cart',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var globlecart = baseurl + "Api/cartOperationCustom";

//                var form = new FormData()
                form.append('product_id', product_id);
                form.append('quantity', 1);
                form.append('custome_id', gcustome_id);
                $http.post(globlecart, form).then(function (rdata) {
                    swal.close();
                    $scope.getCartData();
                    swal({
                        title: 'Added To Cart',
                        type: 'success',
                        html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>Quantity: " + rdata.data.quantity + "</p>",
                        imageUrl: rdata.data.file_name,
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            window.location = baseurl + "Cart/details";
                        }
                    })
                }, function () {
                    swal.close();
                    swal({
                        title: 'Something Wrong..',
                    })
                });
            },
        })
    }







    setTimeout(function () {
        $('.custom_block_slide').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })


        $('.custom_block_elements').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

        $('#accordion1').on('shown.bs.collapse', function () {
            $("[aria-controls=" + ($(".elementItemBox.in")[0].id) + "] i").removeClass("fa-plus").addClass("fa-minus")
        })


        $('#accordion1').on('hidden.bs.collapse', function () {
            $(".button-expand i").removeClass("fa-minus").addClass("fa-plus")
        })

    }, 1500)




});

