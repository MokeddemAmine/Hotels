$(document).ready(function(){
    // confirm the deletion
    $('.confirm-delete').click(function(){
        return confirm("You sure want to delete this ?");
    })
    // hide placeholder when focus and blur on a input form

    // take the right height and width for login form
    $('.parent-sign').width($('.sign-up').width());
    $('.parent-sign').height($('.sign-up').height())
    // toggle between sign in & sign up
    $('#go-to-sign-up').click(function(){
        $('.sign-in').css('transform','translate(-100%)');
        $('.sign-up').css('transform','translate(-100%)');
        $('.forgot-password').css('transform','translate(-100%)');
    })
    $('.go-to-sign-in').click(function(){
        $('.sign-in').css('transform','translate(0)');
        $('.sign-up').css('transform','translate(0)');
        $('.forgot-password').css('transform','translate(0)');
    })
    $('#forget-password').click(function(){
        $('.sign-in').css('transform','translate(100%)');
        $('.sign-up').css('transform','translate(100%)');
        $('.forgot-password').css('transform','translate(100%)');
    })

    // divise the content of carousel of discover relation with body screen
    
    var webWidth = $('body .container').outerWidth();

    let discoverNames = ['All inclusive','Sea view','Resort','Pool','Pet friendly','Apartment','Apart hotel','Spa','Villa','Waterpark'];
    var active = 'carousel-item';
    if(webWidth < 720){
        for(let i = 1; i <= 10; i= i+2){
            if(i == 1){
                 active+= " active";
            }else{
                active = "carousel-item";
            }
            $('.discover-new-fav .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i-1]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+1}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i]}</p>
                            </a>
                        </div>
                    </div>
                </div>`
            );
        }
    }else if(webWidth < 960){
        for(let i = 1; i <= 10; i= i+3){
            if(i == 1){
                active+= " active";
           }else{
               active = "carousel-item";
           }
            if(i == 10){
                $('.discover-new-fav .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i-1]}</p>
                            </a>
                        </div>
                    </div>
                </div>`
            );
            }else{
                $('.discover-new-fav .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i-1]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+1}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+2}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i+1]}</p>
                            </a>
                        </div>
                    </div>
                </div>`
                );
            }
        }
    }else{
        for(let i = 1; i <= 10; i= i+5){
            if(i == 1){
                active+= " active";
           }else{
               active = "carousel-item";
           }
            $('.discover-new-fav .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i-1]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+1}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+2}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i+1]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+3}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i+2]}</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link">
                                <img src="layout/imgs/discover/${i+4}.jpg" class="d-block w-100" alt="...">
                                <p class="discover-img-info text-white text-decoration-none fw-bold">${discoverNames[i+3]}</p>
                            </a>
                        </div>
                    </div>
                </div>`
            );
        }
    }
    // divise the content of carousel of perfect places relation with body screen
    if(webWidth < 960){
        for(let i = 1; i<= 8; i= i+2){
            if(i==1){
                active+= ' active';
            }else{
                active= 'carousel-item';
            }
            $('.perfect-places .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none">
                                <div class="card">
                                    <img src="layout/imgs/perfect/${i}.jpg" class="card-img-top d-block w-100" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-capitalize">the resident kensington</h5>
                                        <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                        <p class="card-text">8.8/10 Very good (1802)</p>
                                    </div>
                                </div>
                                
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none">
                            <div class="card">
                            <img src="layout/imgs/perfect/${i+1}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">the resident kensington</h5>
                                <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                <p class="card-text">8.8/10 Very good (1802)</p>
                            </div>
                        </div>
                            </a>
                        </div>
                    </div>
                </div>`
                );
        }
    }else{
        for(let i = 1; i <= 8; i = i+4){
           if(i == 1){
                active+= " active";
           }else{
               active = "carousel-item";
           }
           $('.perfect-places .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none ">
                            <div class="card">
                            <img src="layout/imgs/perfect/${i}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">the resident kensington</h5>
                                <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                <p class="card-text">8.8/10 Very good (1802)</p>
                            </div>
                        </div>
                                
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none">
                            <div class="card">
                            <img src="layout/imgs/perfect/${i+1}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">the resident kensington</h5>
                                <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                <p class="card-text">8.8/10 Very good (1802)</p>
                            </div>
                        </div>
                                
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none">
                            <div class="card">
                            <img src="layout/imgs/perfect/${i+2}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">the resident kensington</h5>
                                <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                <p class="card-text">8.8/10 Very good (1802)</p>
                            </div>
                        </div>
                                
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none">
                            <div class="card">
                            <img src="layout/imgs/perfect/${i+3}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">the resident kensington</h5>
                                <h6 class="card-title text-capitalize mb-3">london city center</h6>
                                <p class="card-text">8.8/10 Very good (1802)</p>
                            </div>
                        </div>
                                
                            </a>
                        </div>
                    </div>
                </div>`
            );
        }
    }

     // divise the content of carousel of weekend relation with body screen
     if(webWidth < 540){
        for(let i = 1; i<= 8; i++){
            if(i==1){
                active+= ' active';
            }else{
                active= 'carousel-item';
            }
            $('.weekend .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="discover-new-link text-decoration-none ">
                                <div class="card">
                                    <img src="layout/imgs/discover/${i}.jpg" class="card-img-top d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text m-0"><span class="fw-bold">9.0/10</span> Wonderful (150 reviews)</p>
                                        <p class="card-text text-capitalize m-0 mt-2">Amber El Fell</p>
                                        <p class="card-text text-capitalize m-0">London</p>
                                        <h3 class="card-title price mt-3 mb-0">$200</h3>
                                        <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                        <span class="card-text d-block" style="font-size:.8rem">$400 total</span>
                                        <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                        <button class="btn btn-sm btn-info text-white mt-3"><i class="fa-solid fa-tag"></i> Member Price availabe</button>
                                    </div>
                                </div>
                                
                            </a>
                    </div>
                </div>`
                );
        }
    }
     else if(webWidth < 960){
        for(let i = 1; i<= 8; i= i+2){
            if(i==1){
                active+= ' active';
            }else{
                active= 'carousel-item';
            }
            $('.weekend .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                    <div class="col">
                    <a href="#" class="discover-new-link text-decoration-none ">
                    <div class="card">
                        <img src="layout/imgs/perfect/${i}.jpg" class="card-img-top d-block w-100" alt="...">
                        <div class="card-body">
                            <p class="card-text m-0"><span class="fw-bold">9.0/10</span> Wonderful (150 reviews)</p>
                            <p class="card-text text-capitalize m-0 mt-2">Amber El Fell</p>
                            <p class="card-text text-capitalize m-0">London</p>
                            <h3 class="card-title price mt-3 mb-0">$200</h3>
                            <span class="card-text d-block" style="font-size:.8rem">per night</span>
                            <span class="card-text d-block" style="font-size:.8rem">$400 total</span>
                            <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                            <button class="btn btn-sm btn-info text-white mt-3"><i class="fa-solid fa-tag"></i> Member Price availabe</button>
                        </div>
                    </div>
                        
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="discover-new-link text-decoration-none">
                    <div class="card">
                        <img src="layout/imgs/perfect/${i+1}.jpg" class="card-img-top d-block w-100" alt="...">
                        <div class="card-body">
                                <p class="card-text m-0"><span class="fw-bold">8.6/10</span> Excellent (940 reviews)</p>
                                <p class="card-text text-capitalize m-0 mt-2">petit place museum</p>
                                <p class="card-text text-capitalize m-0">Barcelona</p>
                                <h3 class="card-title price mt-3 mb-0">$240</h3>
                                <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                <span class="card-text d-block" style="font-size:.8rem">$490 total</span>
                                <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                <button class="btn btn-sm btn-danger text-white mt-3">20% off</button>
                        </div>
                    </div>
                        
                    </a>
                </div>
                    </div>
                </div>`
                );
        }
    }else{
        for(let i = 1; i <= 8; i = i+4){
           if(i == 1){
                active+= " active";
           }else{
               active = "carousel-item";
           }
           $('.weekend .carousel-inner').
                append(`<div class="${active}">
                    <div class="row">
                        <div class="col">
                        <a href="#" class="discover-new-link text-decoration-none ">
                        <div class="card">
                            <img src="layout/imgs/perfect/${i}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                <p class="card-text m-0"><span class="fw-bold">9.0/10</span> Wonderful (150 reviews)</p>
                                <p class="card-text text-capitalize m-0 mt-2">Amber El Fell</p>
                                <p class="card-text text-capitalize m-0">London</p>
                                <h3 class="card-title price mt-3 mb-0">$200</h3>
                                <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                <span class="card-text d-block" style="font-size:.8rem">$400 total</span>
                                <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                <button class="btn btn-sm btn-info text-white mt-3"><i class="fa-solid fa-tag"></i> Member Price availabe</button>
                            </div>
                        </div>
                            
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="discover-new-link text-decoration-none">
                        <div class="card">
                            <img src="layout/imgs/perfect/${i+1}.jpg" class="card-img-top d-block w-100" alt="...">
                            <div class="card-body">
                                    <p class="card-text m-0"><span class="fw-bold">8.6/10</span> Excellent (940 reviews)</p>
                                    <p class="card-text text-capitalize m-0 mt-2">petit place museum</p>
                                    <p class="card-text text-capitalize m-0">Barcelona</p>
                                    <h3 class="card-title price mt-3 mb-0">$240</h3>
                                    <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                    <span class="card-text d-block" style="font-size:.8rem">$490 total</span>
                                    <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                    <button class="btn btn-sm btn-danger text-white mt-3">20% off</button>
                            </div>
                        </div>
                            
                        </a>
                    </div>
                    <div class="col">
                                <a href="#" class="discover-new-link text-decoration-none ">
                                <div class="card">
                                    <img src="layout/imgs/perfect/${i+2}.jpg" class="card-img-top d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text m-0"><span class="fw-bold">9.0/10</span> Wonderful (150 reviews)</p>
                                        <p class="card-text text-capitalize m-0 mt-2">Amber El Fell</p>
                                        <p class="card-text text-capitalize m-0">London</p>
                                        <h3 class="card-title price mt-3 mb-0">$200</h3>
                                        <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                        <span class="card-text d-block" style="font-size:.8rem">$400 total</span>
                                        <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                        <button class="btn btn-sm btn-info text-white mt-3"><i class="fa-solid fa-tag"></i> Member Price availabe</button>
                                    </div>
                                </div>
                                    
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="discover-new-link text-decoration-none">
                                <div class="card">
                                    <img src="layout/imgs/perfect/${i+3}.jpg" class="card-img-top d-block w-100" alt="...">
                                    <div class="card-body">
                                            <p class="card-text m-0"><span class="fw-bold">8.6/10</span> Excellent (940 reviews)</p>
                                            <p class="card-text text-capitalize m-0 mt-2">petit place museum</p>
                                            <p class="card-text text-capitalize m-0">Barcelona</p>
                                            <h3 class="card-title price mt-3 mb-0">$240</h3>
                                            <span class="card-text d-block" style="font-size:.8rem">per night</span>
                                            <span class="card-text d-block" style="font-size:.8rem">$490 total</span>
                                            <span class="card-text d-block" style="font-size:.8rem">includes taxes & fees</span>
                                            <button class="btn btn-sm btn-danger text-white mt-3">20% off</button>
                                    </div>
                                </div>
                                    
                                </a>
                            </div>
                        </div>
                </div>`
            );
        }
    }

    // toggle the dates choices 
    $('.can-add').click(function(){
        // test if the current day has active-start-date class:
        let verifyCurrentDay = $(this).hasClass('active-start-date');
        // verify if all others day has active-start-date class:
        let verifySiblingsDay = $(this).parents('.global-dates').find('.can-add').hasClass('active-start-date');
        // verify if one of all days has active-end-date class:
        let verifyEndDay = $(this).parents('.global-dates').find('.can-add').hasClass('active-end-date');

        
        
        if((!verifyCurrentDay && !verifySiblingsDay)){
            $(this).addClass('active-start-date');
        }else if(verifySiblingsDay && !verifyCurrentDay && !verifyEndDay){
            // search the element has active-start-date and get its date
            let date1 = $('.global-dates').find('.active-start-date').data('date');
            // get date of current element
            let date2 = $(this).data('date');
            
            if(dateSmaller(date1,date2)){
                $(this).addClass('active-end-date');

                let dateAmong = $('.global-dates').find('.can-add').each(function(index,element){
                    if(dateSmaller(date1,$(this).data('date')) && dateSmaller($(this).data('date'),date2)){
                        $(this).addClass('active-among-date');
                    }
                    
                })

            }else{
                $('.global-dates').find('.can-add').removeClass('active-start-date');
                $(this).addClass('active-start-date');
            }
            
        }else if(verifyEndDay){
            $('.global-dates').find('.can-add').removeClass('active-start-date');
            $('.global-dates').find('.can-add').removeClass('active-end-date');
            $('.global-dates').find('.can-add').removeClass('active-among-date');
            $(this).addClass('active-start-date');
        }
        
    })
    // function to compare two date 
    function dateSmaller($date1, $date2) {
        $dt1 = new Date($date1);
        $dt2 = new Date($date2);
        
        if ($dt1 < $dt2) {
            return true;
        } else{
            return false;
        }
    }

    // print date when click done
    $('#done-date').click(function(){
        if($('.global-dates').find('.can-add').hasClass('active-start-date') && $('.global-dates').find('.can-add').hasClass('active-end-date')){
            $('.dates-info-changed').text($('.active-start-date').data('date')+' - '+$('.active-end-date').data('date'));
        }
    })
    // toggle the traveller input field
    $('.travellers').click(function(){
        $('#travellers-details').toggle()
    })
    $("body").click(function(event){
        if (!$(event.target).closest('.travellers-room, .remove-room').length) {
            $('#travellers-details').hide()
        }
    });
    $('#done-travellers').click(function(){
        $('#travellers-details').hide()
    })
    // add room in traveller input
    const room = $('.room:first-child .room-content').html();
    let roomNumber = 2;
    let travellers = 1;
    $('#add-another-room').click(function(){
        
        updateRoom = '<div class="room-content">'+room+'</div>';
        updateRoom = '<h6>Room '+roomNumber+'</h6>'+updateRoom;
        var newRoom = '<div class="room" data-room="'+roomNumber+'">'+updateRoom+'</div>';
        $(this).parent().before(newRoom);
        // add rooms number the input field result
        $('.room-number').text(roomNumber+ ' rooms');
        // add travellers number the input field result
        
        travellers++;
        $('.traveller-number').text(travellers+' travellers');
        
        roomNumber++;
        if(roomNumber > 2){
            $('.remove-room').parent().css('display','block');
        }

        // remove previous clicks 
        $('.remove-room').off('click');
        // use the new clicks
        $('.remove-room').click(function(e){
            e.preventDefault();
            // decrease the number of travellers
            let trr = 0;
            $(this).parents('.room-content').find('.number-adults, .number-children').each(function(){
                trr += parseInt($(this).text());
            })
            travellers = travellers - trr;
            $('.traveller-number').text(travellers+' travellers');
            // edit all the next .room element : minus data-room by 1
            // delete the current room
            if($(this).parents('.room').next('.room').length){
                $(this).parents('.room').nextAll('.room').each(function(){
                    $(this).attr('data-room',$(this).attr('data-room')-1);
                    $(this).children('h6').html('<h6>Room '+$(this).attr('data-room')+'</h6>');
                    
                })
            }
            $(this).parents('.room').remove();
            roomNumber--;
            if(roomNumber == 2){
                $('.room-number').text('1 room');
            }else{
                $('.room-number').text(roomNumber - 1 +' rooms');
            }

            if($('.room').length == 1){
                $('.remove-room').parent().css('display','none');
            }
            
            
        })

        $('.minus-btn').off('click');
        $('.plus-btn').off('click');
        // increase and decrease number adults and children
        $('.minus-btn').click(function(){
            if($(this).next().hasClass('number-adults') && $(this).next('.number-adults').text() > 1){
                $(this).next('.number-adults').text($(this).next('.number-adults').text() - 1);
                travellers--;
            }
            else if($(this).next().hasClass('number-children') && $(this).next('.number-children').text() > 0){
                $(this).next('.number-children').text($(this).next('.number-children').text() - 1);
                travellers--;
            }  
            if(travellers > 1){
                $('.traveller-number').text(travellers+' travellers');
            }else{
                $('.traveller-number').text('1 traveller');
            }
        })
        $('.plus-btn').click(function(){
            if($(this).prev().text() < 9){
                $(this).prev().text(parseInt($(this).prev().text()) + 1);
                travellers++;
                $('.traveller-number').text(travellers+' travellers');
            } 
            
        })
        
        
    })
    
    // increase and decrease number adults and children
    $('.minus-btn').click(function(){
        if($(this).next().hasClass('number-adults') && $(this).next('.number-adults').text() > 1){
            $(this).next('.number-adults').text($(this).next('.number-adults').text() - 1);
            travellers--;
        }else if($(this).next().hasClass('number-children') && $(this).next('.number-children').text() > 0){
            $(this).next('.number-children').text($(this).next('.number-children').text() - 1);
            travellers--;
        } 
        if(travellers > 1){
            $('.traveller-number').text(travellers+' travellers');
        }else{
            $('.traveller-number').text(travellers+' traveller');
        }
        
    })
    $('.plus-btn').click(function(){
        if($(this).prev().text() < 9){
            console.log($(this).prev());
            $(this).prev().text(parseInt($(this).prev().text()) + 1);
            travellers++;
            $('.traveller-number').text(travellers+' travellers');
        } 
        
        
    })

    // repare the height of the info details in account.php
    if($('body').width() >= 768){
        $('.account-details').height($('body').height() - $('nav').height());
        //$('.our-hotels').height(500);
    }
    // use popover
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    
})

$(document).ready(function(){
    // slide element in create new hotel
    $('#from-hotel-to-room, #from-amenities-to-room').click(function(){
        $('.hotel').css('left','-100%');
        $('.room').css('left','0');
        $('.amenities').css('left','100%');
    })
    $('#from-room-to-hotel').click(function(){

        $('.hotel').css('left','0');
        $('.room').css('left','100%');
        $('.amenities').css('left','200%');
    })
    $('#from-room-to-amenities').click(function(){

        $('.hotel').css('left','-200%');
        $('.room').css('left','-100%');
        $('.amenities').css('left','0');
    })

    // print the hotels product in product page for user
    let arrayHotels = [];
    // get hotels details from product page
    $('.our-hotels .hotel-details').each(function(){
        var hotelArr = {};
        hotelArr.id     = $(this).find('.hotelID').text();
        hotelArr.photo  = $(this).find('.photo').text();
        hotelArr.name   = $(this).find('.name').text();
        hotelArr.state  = $(this).find('.state').text();
        hotelArr.price  = $(this).find('.price').text();
        arrayHotels.push(hotelArr);
    })
    console.log(arrayHotels);
    // delete the info from products 
    $('.our-hotels .carousel-inner .hotel-details').remove();
    // set new design to product page
    for(let i = 0;i < arrayHotels.length ; i++){
        let active = i==0?'active':'';
        var hotelDetail;
        if(screen.width < 992){
            hotelDetail = `
                <div class="carousel-item ${active}">
                    <a href="?do=showHotel&hotelid=${arrayHotels[i].id}" class="text-dark text-decoration-none">
                        <div class="card">
                            <img src="layout/imgs/${arrayHotels[i].photo}" class="card-img-top" style="height:400px;object-fit:contain;">
                            <div class="card-body">
                                <h5 class="card-title">${arrayHotels[i].name}</h5>
                                <h6 class="card-title">${arrayHotels[i].state}</h6>
                                <h6 class="card-text m-0">${arrayHotels[i].price}</h6>
                                <p class="card-text m-0">per night</p>
                                <p class="card-text m-0">includes taxes & fees</p>
                            </div>
                        </div>
                    </a>
                </div>
            `
            $('.our-hotels .carousel-inner').append(hotelDetail);
        }else{
            if(i%2 == 0){
                hotelDetail = `
                <div class="carousel-item ${active}">
                    <div class="row">`;
            }
            hotelDetail += `
                        <div class="col">
                            <a href="?do=showHotel&hotelid=${arrayHotels[i].id}" class="text-dark text-decoration-none">
                                <div class="card mx-3 p-2">
                                    <img src="layout/imgs/${arrayHotels[i].photo}" class="card-img-top" style="height:400px;object-fit:contain;">
                                    <div class="card-body">
                                        <h5 class="card-title">${arrayHotels[i].name}</h5>
                                        <h6 class="card-title">${arrayHotels[i].state}</h6>
                                        <h6 class="card-text m-0">${arrayHotels[i].price}</h6>
                                        <p class="card-text m-0">per night</p>
                                        <p class="card-text m-0">includes taxes & fees</p>
                                    </div>
                                </div>
                            </a>
                        </div>
            `;
            if(i%2 == 1){
                hotelDetail += `
                        </div>
                    </div>
                `
                $('.our-hotels .carousel-inner').append(hotelDetail);
            }
            if(i+1 == arrayHotels.length){
                hotelDetail +=`
                    <div class="col"></div>
                    </div>
                    </div>
                `;
                $('.our-hotels .carousel-inner').append(hotelDetail);
            }
            
        }
        
    }
})