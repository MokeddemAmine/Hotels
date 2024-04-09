$(document).ready(function(){
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
    console.log(webWidth)

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
})