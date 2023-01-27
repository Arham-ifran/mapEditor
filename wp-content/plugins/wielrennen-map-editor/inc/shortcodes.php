<?php



add_shortcode('map_editor' , 'map_editor_design');



function map_editor_design(){ ?>
<?php 
    global $wpdb;
    $admin_wie_gpx =  $wpdb->prefix.'admin_wie_gpx';
    $event_id = $_GET['event-id'];
  
    $event_map_info = '';
    if(isset($event_id) && !empty($event_id)) {
        $event_map_info = $wpdb->get_row("SELECT *  FROM $admin_wie_gpx WHERE is_active = 1 AND event_id = '$event_id'");
    }
    
    
?>
<div id="open-modal" class="modal-window">
  <div>
  <div class="modal-header">
    <div href="#" title="Close" class="close-modal-top-btn"> <span>×</span></div>
    <h1>Custom Map</h1>
  </div>
  <div class="custom-map-modal">
    <form>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control product_title"  value="" >
        </div>
        
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" class="form-control product_image"  id="product_image" accept="image/*" >
        </div>
        <div class="mb-3">
            <label class="form-label">Event Logo</label>
            <input type="file" class="form-control event_logoo"  id="event_logo" accept="image/*" >
        </div>
        <div class="mb-3">
            <label class="form-label">Logo Direction</label>
            <select class="form-control" name="event_select" id="event_select">
                <option value=""> Select </option>
                <option value="top_right">  Right </option>
                <option value="top_left">  Left </option>
                <option value="top_center">  Center </option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="text" class="form-control date_picker"  id="date_picker"  >
        </div>
       
        <button type="button" class="btn btn-primary gpx_product_update">Update</button>
    </form>
  </div>
   
  </div>
</div>

<section class="rolling_image show_alerts">

    <p>Even geduld a.u.b. tijdens het laden...!</p>

</section>

<section class="show_alerts error_images" style="display: none;">

    <p>Kan GPX-gegevens niet ontleden....</p>

</section>
<section class="waiting_rolling_image show_alerts" style="display: none;">

    <p>Even geduld a.u.b....!</p>

</section>



<section class="load">

    <p>Het laden No Pain Frame Poster</p>

</section>

<!-- <section class="load"></section> -->

<section class="unsupported">
    <div>
        <h1>Sorry, maar de ontwerptool is alleen beschikbaar op desktop.</h1>
        <div class="area">
            <p>Vanwege de uitgebreide ontwerpopties die beschikbaar zijn, hebben we de toegang tot de ontwerptool moeten beperken tot alleen desktopbrowsers.</p>
            <a class="button large copy" data-action-target="browser_url_copy"></a>
            <a class="button large email" data-action-target="browser_url_email">Mail mij de link</a>
        </div>
        
    </div>
</section>

<div class="wrapper custom-fixed-height">

    <aside class="option">

        <section class="stage activity" data-view-source="activity">

            <div class="scroll">

                <section class="step intro" data-view-source="intro">

                    <header>

                        <div class="title">

                            <h2>ACTIVITEIT(EN) TOEVOEGEN</h2>

                        </div>

                    </header>

                    <div class="content">

                        <div class="transfer">

                            <div class="item strava">

                                <div class="connect">

                                    <a class="button large" data-action-target="activity_strava_authorize">VERBINDING
                                        MAKEN MET</a>

                                    <h6>Maak een verbinding met jouw Strava account en voeg je activiteit(en) toe</h6>

                                </div>

                                <div class="search">

                                    <a class="button large" data-action-target="activity_strava_explore">Zoeken</a>

                                    <h6>Ontdek je Strava-activiteiten</h6>

                                </div>

                            </div>

                            <div class="item upload">

                                <a class="button large tertiary">

                                    <input type="file" accept=".gpx" multiple="">

                                    UPLOAD EEN GPX-ACTIVITEIT

                                </a>

                                <h6>Zit je niet op Strava? Upload dan hier een GPX-bestand</h6>

                            </div>

                        </div>

                        <div class="question faqs-question">

                            <h3>VEELGESTELDE VRAGEN</h3>

                            <div class="item">

                                <p>Weet je niet precies wat een GPX-bestand is of hoe je hieraan komt? Lees onze handige
                                    gids zodat je jouw poster kan ontwerpen</p>

                            </div>

                            <div class="item">

                                <p>Wil je een kaart maken voor iemand anders? Lees onze gids over het ophalen of het
                                    maken van een activiteit</p>

                            </div>

                            <div class="item">

                                <p>Heb je je rit niet geregistreerd? Maak de rit aan met behulp van een tool zoals <a
                                        href="https://plotaroute.com" target="_blank">plotaroute.com</a> en download het
                                    GPX-bestand</p>

                            </div>

                            <div class="item">

                                <p>Overige vragen? Neem <a href="<?php echo site_url(); ?>/contact">contact met ons
                                        op</a> en we beantwoorden je vraag zo snel mogelijk!</p>

                            </div>

                        </div>

                    </div>

                    <footer></footer>

                </section>

                <section class="step strava" data-view-source="strava">

                    <header>

                        <div class="title">

                            <a class="previous apply-btn" data-view-target="activity:intro"></a>

                            <h2>JOUW STRAVA ACTIVITEITEN</h2>

                        </div>

                    </header>

                    <div class="content">

                        <div class="field search">

                            <input type="text" id="search" name="search"
                                placeholder="Zoek naar een Strava activiteit...">

                        </div>

                        <section class="list">

                            <div class="item clone">

                                <div class="detail">

                                    <h4></h4>

                                    <div class="metadata">

                                        <span class="time"></span>

                                        <span class="distance"></span>

                                        <span class="duration"></span>

                                    </div>

                                </div>

                                <a class="toggle" data-action-target="activity_strava_toggle"></a>

                            </div>

                        </section>

                    </div>

                    <footer>

                        <aside class="note info">

                            <h4>Kun je je activiteit niet vinden?</h4>

                            <p>Helaas beperkt Strava het aantal ritten dat we uit hun database kunnen halen. Probeer het
                                dan met de <a data-view-target="activity:intro">GPX upload</a> mogelijkheid.</p>

                        </aside>

                        <div class="action">

                            <a class="button large primary design first_screen_btn" data-view-target="design">VOLGENDE
                                STAP: Design</a>

                        </div>

                    </footer>

                </section>

                <section class="step inventory" data-view-source="inventory">

                    <header>

                        <div class="title">

                            <h2>Geïmporteerde ritten</h2>

                        </div>

                    </header>

                    <div class="content">

                        <section class="list position">

                            <div class="item clone">

                                <div class="picture"></div>

                                <div class="detail">

                                    <h4></h4>

                                    <div class="metadata">

                                        <span class="time"></span>

                                        <span class="distance"></span>

                                        <span class="duration"></span>

                                    </div>

                                </div>

                                <a class="delete"></a>

                            </div>

                        </section>

                        <div class="transfer">

                            <div class="item strava">

                                <div class="connect">

                                    <a class="button large" data-action-target="activity_strava_authorize">VERBINDING
                                        MAKEN MET</a>

                                    <h6>

                                        Maak een verbinding met jouw Strava account en voeg je activiteit(en) toe

                                    </h6>

                                </div>

                                <div class="search">

                                    <a class="button large" data-action-target="activity_strava_explore">Search</a>

                                    <h6>Ontdek je Strava-activiteiten</h6>

                                </div>

                            </div>

                            <div class="item upload">

                                <a class="button large tertiary">

                                    <input type="file" accept=".gpx" multiple="">

                                    GPX-activiteiten uploaden

                                </a>

                                <h6>Zit je niet op Strava? Upload dan hier een GPX-bestand</h6>

                            </div>

                        </div>

                    </div>

                    <footer>

                        <div class="action">

                            <a class="button large primary design second_btn" data-view-target="design">VOLGENDE STAP:
                                Design</a>

                        </div>

                    </footer>

                </section>

            </div>

        </section>

        <section class="stage design" data-view-source="design">

            <div class="scroll">

                <section class="step design display">

                    <header>

                        <div class="title">

                            <!--   <a class="previous apply-btn" data-view-target="activity:inventory"></a> -->

                            <a class="previous apply-btn all-btn-behv"></a>

                            <h2>ONTWERP JOUW KAART</h2>

                        </div>

                        <a>Bekijk onze instructie video</a>

                    </header>

                    <div class="content">

                        <!-- Icons group -->

                        <div class="group icons-list">
                           
                            <div class="toggle-icons">

                                <a class="item color-scheme" data-id="item1">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Kleurenschema</h6>

                                    </div>

                                </a>

                                <a class="item layout" data-id="item2">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Layout</h6>

                                    </div>

                                </a>
                                <a class="item colors" data-id="item21">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Kleuren</h6>

                                    </div>

                                </a>

                                <a class="item overlay" data-id="item3">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Verloop</h6>

                                    </div>

                                </a>
                                

                                <a class="item titles titles_one" data-id="item4">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Titels</h6>

                                    </div>

                                </a>
                                <a class="item titles theme_two theme_hide" data-id="item10">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Titels</h6>

                                    </div>

                                </a>
                                <a class="item titles theme_three theme_hide" data-id="item11">

                                <div>

                                <div class="picture"></div>

                                <h6>Titels</h6>

                                </div>

                                </a>

                                <a class="item map-marker" data-id="item5">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Kaartmarkering</h6>

                                    </div>

                                </a>

                                <a class="item line-thikness" data-id="item6">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Lijndikte</h6>

                                    </div>

                                </a>

                                <a class="item font-style" data-id="item7">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Lettertype</h6>

                                    </div>

                                </a>

                                <a class="item elevation" data-id="item8">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Hoogteprofiel</h6>

                                    </div>

                                </a>

                                <a class="item activity" data-id="item9">

                                    <div>

                                        <div class="picture"></div>

                                        <h6>Activiteit</h6>

                                    </div>

                                </a>
                               
                                



                            </div>

                        </div>



                        <!-- style -->

                        <div class="show-group-lists">

                            <!-- Style -->

                            <div class="group style" data-id="item1">

                                <h3>Kleurenschema</h3>

                                <div class="scheme" data-design-key="poster_style">

                                    <a class="item grey_light" data-design-value="grey_light">

                                        <div class="picture"></div>

                                        <h6>Lichtgrijs</h6>

                                    </a>

                                    <a class="item orange" data-design-value="orange">

                                        <div class="picture"></div>

                                        <h6>Oranje</h6>

                                    </a>

                                    <a class="item grey_dark" data-design-value="grey_dark">

                                        <div class="picture"></div>

                                        <h6>Donkergrijs</h6>

                                    </a>

                                    <a class="item blue" data-design-value="blue">

                                        <div class="picture"></div>

                                        <h6>Blauw</h6>

                                    </a>

                                    <a class="item outdoor" data-design-value="outdoor">

                                        <div class="picture"></div>

                                        <h6>Buiten</h6>

                                    </a>

                                    <a class="item pastel" data-design-value="pastel">

                                        <div class="picture"></div>

                                        <h6>Pastel</h6>

                                    </a>

                                    <a class="item spring" data-design-value="spring">

                                        <div class="picture"></div>

                                        <h6>Lente</h6>

                                    </a>

                                    <a class="item black_white" data-design-value="black_white">

                                        <div class="picture"></div>

                                        <h6> Zwart & Wit</h6>

                                    </a>
                                    <a class="item lichtblauw" data-design-value="lichtblauw">

                                    <div class="picture"></div>

                                    <h6> Lichtblauw</h6>

                                    </a>
                                    <a class="item donkerblauw" data-design-value="donkerblauw">

                                        <div class="picture"></div>

                                        <h6> donkerblauw</h6>

                                    </a>
                                   
                                    <a class="item vintage" data-design-value="vintage">

                                        <div class="picture"></div>

                                        <h6> Vintage</h6>

                                    </a>
                                    <a class="item groen" data-design-value="groen">

                                        <div class="picture"></div>

                                        <h6> Groen</h6>

                                    </a>
                                    <a class="item retro" data-design-value="retro">

                                    <div class="picture"></div>

                                    <h6> Retro</h6>

                                    </a>

                                    <a class="item street" data-design-value="street">

                                    <div class="picture"></div>

                                    <h6> Street</h6>

                                    </a>
                                    <!-- paper -->
                                    <a class="item americanrust" data-design-value="americanrust">

                                        <div class="picture"></div>

                                        <h6> American Rust</h6>

                                    </a>
                                    <a class="item lingerie" data-design-value="lingerie">

                                        <div class="picture"></div>

                                        <h6> Lingerie</h6>

                                    </a>
                                    <a class="item theclassic" data-design-value="theclassic">

                                        <div class="picture"></div>

                                        <h6> The Classic</h6>

                                    </a>
                                    <a class="item swampthings" data-design-value="swampthings">

                                        <div class="picture"></div>

                                        <h6> Swamp Things</h6>

                                    </a>
                                    <a class="item crimsonride" data-design-value="crimsonride">

                                        <div class="picture"></div>

                                        <h6> Crimson Ride</h6>

                                    </a>
                                    <a class="item mintymiles" data-design-value="mintymiles">

                                        <div class="picture"></div>

                                        <h6> Minty Miles</h6>

                                    </a>
                                    <a class="item paperchase" data-design-value="paperchase">

                                        <div class="picture"></div>

                                        <h6> Paper Chase</h6>

                                    </a>
                                    <a class="item reddead" data-design-value="reddead">

                                        <div class="picture"></div>

                                        <h6> Red dead</h6>

                                    </a>
                                    <a class="item moonraker" data-design-value="moonraker">

                                        <div class="picture"></div>

                                        <h6> Moonraker</h6>

                                    </a>
                                    <a class="item coppermine" data-design-value="coppermine">

                                        <div class="picture"></div>

                                        <h6> Copper Mine</h6>

                                    </a>
                                    <a class="item heather" data-design-value="heather">

                                        <div class="picture"></div>

                                        <h6> Heather</h6>

                                    </a>
                                    <a class="item outlinesonice" data-design-value="outlinesonice">

                                        <div class="picture"></div>

                                        <h6> Outlines On ice</h6>

                                    </a>
                                    <a class="item outline2" data-design-value="outline2">

                                        <div class="picture"></div>

                                        <h6> Outline 2</h6>

                                    </a>


                                </div>



                            </div>
                            <!-- orientation -->

                            <div class="group layout_theme" data-id="item2">
                                <h3>Thema</h3>

                                <div class="block" data-design-key="layout_theme">

                                    <a class="item on-map" data-design-value="theme-one">

                                        <div>


                                            <h6>Op de Kaart</h6>

                                        </div>

                                    </a>
                              
                                    <a class="item outside-map" data-design-value="theme-two">

                                        <div>

                                            <h6>Buiten Kaart</h6>

                                        </div>

                                    </a>
                                    <a class="item classic-map" data-design-value="theme-three">

                                    <div>

                                    <h6>Klassieke Kaart</h6>

                                    </div>

                                    </a>

                                </div>
                                <div class="group position position_text" data-id="item2">
                                    <h3 style="margin-top: 20px;">Positie</h3>

                                    <div class="block" data-design-key="position">

                                        <a class="item top" data-design-value="layout-top">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Bovenkant</h6>

                                            </div>

                                        </a>

                                        <a class="item bottom" data-design-value="layout-bottom">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Onderkant</h6>

                                            </div>

                                        </a>

                                    </div>


                                </div>
                              
                                <div class="group orientation" data-id="item2">
                                <h3 style="margin-top: 20px;">Layout</h3>
                                <div class="block" data-design-key="paper_orientation">

                                    <a class="item portrait" data-design-value="portrait">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Verticaal</h6>

                                        </div>

                                    </a>

                                    <a class="item landscape" data-design-value="landscape">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Horizontaal</h6>

                                        </div>

                                    </a>

                                </div>
                                </div>

                                <div class="group material materials" data-id="item2">

                                    <h3>Materialen <a href="/materiaal/" target="_blank">&#x2139;</a></h3>

                                    <div class="block" data-design-key="paper_material">
                                        <a class="item framed_poster framed_poster_list" data-design-value="framed_poster">

                                        <div class="inner-item">

                                        <h6>Poster met houten lijst</h6>

                                        </div>

                                        </a>
                                        <a class="item non-framed-poster nframed_poster_list" data-design-value="non-framed-poster">

                                            <div class="inner-item">

                                            <h6>Poster zonder lijst</h6>

                                            </div>

                                        </a>

                                        <a class="item canvas non_framed_poster_list" data-design-value="canvas">

                                            <div class="inner-item">

                                                <h6>Canvas</h6>

                                            </div>

                                        </a>

                                        <a class="item aluminium non_framed_poster_list" data-design-value="aluminium">

                                            <div class="inner-item">

                                                <h6>Aluminium</h6>

                                            </div>

                                        </a>

                                        <a class="item glass non_framed_poster_list" data-design-value="plexiglas">

                                            <div class="inner-item">

                                                <h6>Plexiglas</h6>

                                            </div>

                                        </a>
                                        

                                    </div>

                                </div>
                                <div class="group framed_poster framed_list" data-id="item2">

                                    <h3>Kleur houten lijst</h3>
                                    <div class="block" data-design-key="framed_poster">

                                        <a class="item framed_black classic" data-design-value="black">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Zwart</h6>

                                            </div>

                                        </a>

                                        <a class="item framed_white classic" data-design-value="white">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Wit</h6>

                                            </div>

                                        </a>

                                        <a class="item framed_wood classic" data-design-value="wood">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Hout</h6>

                                            </div>

                                        </a>



                                    </div>

                                </div>

                                <div class="group size custom-design" data-id="item2">

                                    <h3>Afmeting</h3>

                                    <div class="block" data-design-key="paper_size">

                                    

                                        <a class="item size20 activeframe" data-design-value="20x30">

                                            <div class="inner-item">

                                                <span>20x30 cm</span>

                                            </div>

                                        </a>

                                        <a class="item size30 activeframe" data-design-value="30x40">

                                            <div class="inner-item">

                                                <span>30x40 cm</span>

                                            </div>

                                        </a>
                                        <a class="item size40 activeframe non-active-frame" data-design-value="40x50">

                                            <div class="inner-item">

                                                <span>40x50 cm</span>

                                            </div>

                                        </a>

                                        <a class="item size50 activeframe" data-design-value="50x70">

                                            <div class="inner-item">

                                                <span>50x70 cm</span>

                                            </div>

                                        </a>

                                        <a class="item size60 noframe" data-design-value="60x90">

                                            <div class="inner-item">

                                                <span>60x90 cm</span>

                                            </div>

                                        </a>

                                        <a class="item size70 noframe" data-design-value="70x100">

                                            <div class="inner-item">

                                                <span>70x100 cm</span>

                                            </div>

                                        </a>

                                    </div>

                                </div>



                                <!-- outline -->

                                <div class="group outline" data-id="item2">

                                    <h3>Vorm</h3>

                                    <div class="block" data-design-key="outline_type">

                                        <a class="item classic" data-design-value="classic">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Klassiek</h6>

                                            </div>

                                        </a>

                                        <a class="item circle" data-design-value="circle">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Cirkel</h6>

                                            </div>

                                        </a>

                                        <a class="item square" data-design-value="square">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <h6>Vierkant</h6>

                                            </div>

                                        </a>

                                        <a class="item none" data-design-value="none">

                                            <div class="inner-item">

                                                <div class="icon"></div>

                                                <!-- <h6>None</h6> -->

                                            </div>

                                        </a>

                                    </div>

                                </div>






                            </div>

                            <!-- overlay -->

                            <div class="group overlay" data-id="item3">

                                <h3>Verloop</h3>

                                <div class="block" data-design-key="overlay_type">

                                    <a class="item radial" data-design-value="radial">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Radiaal</h6>

                                        </div>

                                    </a>

                                    <a class="item linear" data-design-value="linear">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Verticaal</h6>

                                        </div>

                                    </a>

                                    <a class="item none" data-design-value="nonelay">

                                        <div>

                                            <div class="icon"></div>

                                            <!-- <h6>None</h6> -->

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <!-- colors -->

                            
                                                        <!-- Style -->

                            <div class="group style" data-id="item21">

                                    <h3>Kleuren</h3>

                                    <div class="scheme color_scheme" data-design-key="color_pick">

                                            <div class="color_styles">
                                                <input type="color" id="primary_color" name="primary_color"
                                                value="#000000">
                                                <h6>Primaire tekstkleur</h6>
                                               
                                            </div>

                                        

                                       

                                            <div class="color_styles">
                                                <input type="color" id="secondary_color" name="secondary_color"
                                                value="#000000">

                                                <h6>Secundaire tekstkleur</h6>
                                            
                                            </div>

                                            <div class="color_styles">
                                                <input type="color" id="bg_color" name="bg_color"
                                                value="#d7d9d9">
                                                <h6>Kleur achtergrond</h6>
                                           
                                            </div>
                                        

                                       
                                            <div class="color_styles">
                                                <input type="color" id="activity_color" name="activity_color"
                                                value="#e76c2f">
                                                <h6>Kleur activiteit</h6>
                                            </div>
                                           

                                        
                                            <div class="color_styles">
                                                <input type="color" id="elevation_color" name="elevation_color"
                                                value="#c1c3c3">
                                                <h6>Kleur hoogteprofiel</h6>
                                           </div>


                                    </div>



                            </div>


                            <!-- text -->

                            <div class="group text" data-id="item4">

                                <h3>Titels</h3>

                                <div class="form" data-design-key="text">

                                    <div class="field text">

                                        <input type="text" id="text[headline]" name="text[headline]"
                                            placeholder="Kop toevoegen">

                                    </div>

                                    <div class="field text">

                                        <input type="text" id="text[subtitle]" name="text[subtitle]"
                                            placeholder="Ondertitel toevoegen">

                                    </div>

                                    <div class="field text">

                                        <input type="text" id="text[footnote]" name="text[footnote]"
                                            placeholder="Voetnoot toevoegen">

                                    </div>

                                    <div class="field text">

                                        <input type="text" id="text[metadata]" name="text[metadata]"
                                            placeholder="Activiteitsgegevens toevoegen">

                                        <div class="note">

                                            <strong>De bovenstaande activiteitsgegevens zijn bewerkbaar.</strong> Let op
                                            dat de geïmporteerde data niet altijd correct is. Check dit goed!

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- label -->

                            <div class="group label" data-id="item5">

                                <h3>Kaartmarkering</h3>

                                <p>

                                    Klik op de kaart om een markering toe te voegen<br>

                                    <a href="">Bekijk onze video om te kijken hoe dit werkt</a>

                                </p>

                                <div class="item clone">

                                    <div class="field text" data-design-key="label_text">

                                        <input type="text" id="" name="" value="" placeholder="Label">

                                    </div>

                                    <div class="block" data-design-key="label_anchor">

                                        <a class="item anchor_left" data-design-value="left">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Stip links</h6>

                                            </div>

                                        </a>

                                        <a class="item anchor_bottom" data-design-value="bottom">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Midden</h6>

                                            </div>

                                        </a>

                                        <a class="item anchor_right" data-design-value="right">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Stip rechts</h6>

                                            </div>

                                        </a>

                                        <a class="item delete" data-design-value="delete">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Verwijder</h6>

                                            </div>

                                        </a>

                                    </div>

                                </div>

                            </div>
                            <!-- line width -->

                            <div class="group line_width" data-id="item6">

                                <h3>Lijndikte</h3>

                                <div class="block" data-design-key="activity_line_width">

                                    <a class="item width_1" data-design-value="1"></a>

                                    <a class="item width_2" data-design-value="2"></a>

                                    <a class="item width_3" data-design-value="3"></a>

                                    <a class="item width_4" data-design-value="4"></a>

                                    <a class="item width_5" data-design-value="5"></a>

                                </div>

                            </div>

                            <!-- font family -->

                            <div class="group font_family" data-id="item7">

                                <h3>Lettertype</h3>

                                <div class="form-group font-family" data-design-key="font_family">

                                    <div class="custom-select">

                                        <select class="form-control">

                                            <option>Lettertype</option>

                                            <option data-design-value="circular">Circular</option>

                                            <option data-design-value="effra">Effra</option>

                                            <option data-design-value="source">Source Sans</option>

                                            <option data-design-value="montserrat">Montserrat</option>

                                            <option data-design-value="roboto">Roboto Slab</option>

                                            <option data-design-value="literata">Literata</option>

                                            <option data-design-value="playfair">Playfair</option>

                                            <option data-design-value="redrose">Red Rose</option>

                                        </select>

                                    </div>

                                </div>

                                <!-- font size -->

                                <div class="group font_size" data-id="item7">

                                    <h3>Grootte van het lettertype</h3>

                                    <div class="inline" data-design-key="font_size">

                                        <a class="item" data-design-value="small">S</a>

                                        <a class="item" data-design-value="medium">M</a>

                                        <a class="item" data-design-value="large">L</a>

                                        <a class="item" data-design-value="extra">XL</a>

                                    </div>

                                </div>

                            </div>

                            <!-- elevation profile -->

                            <div class="group elevation_enable" data-id="item8">

                                <h3>Hoogteprofiel</h3>

                                <div class="inline" data-design-key="elevation_enable">

                                    <a class="item" data-design-value="true">Ja</a>

                                    <a class="item" data-design-value="false">Nee</a>

                                </div>

                                <p>

                                    Zorg dat je de activiteiten in de goede volgorde hebt staan<br>

                                    <a data-view-target="activity:inventory">Klik hier om de volgorde van de
                                        activiteiten aan te passen</a>

                                </p>

                                <div class="group elevation_multiply" data-id="item8">

                                    <h3>Hoogte van het profiel</h3>

                                    <div class="block" data-design-key="elevation_multiply">

                                        <a class="item small" data-design-value="small">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Laag</h6>

                                            </div>

                                        </a>

                                        <a class="item medium" data-design-value="medium">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Gemiddeld</h6>

                                            </div>

                                        </a>

                                        <a class="item large" data-design-value="large">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Hoog</h6>

                                            </div>

                                        </a>

                                    </div>

                                </div>

                            </div>
                            <!-- point finish -->

                            <div class="group point_finish" data-id="item9">

                                <h3>Eindpunten activiteit tonen ?</h3>

                                <div class="block" data-design-key="activity_point_finish">

                                    <a class="item positive" data-design-value="true">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Ja</h6>

                                        </div>

                                    </a>

                                    <a class="item negative" data-design-value="false">

                                        <div>

                                            <div class="icon"></div>

                                            <h6>Nee</h6>

                                        </div>

                                    </a>

                                </div>

                                <!-- point track -->

                                <div class="group point_activity" data-id="item9">

                                    <h3>Start & Stoppunt activiteit tonen ?</h3>

                                    <div class="block" data-design-key="activity_point_activity">

                                        <a class="item positive" data-design-value="true">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Ja</h6>

                                            </div>

                                        </a>

                                        <a class="item negative" data-design-value="false">

                                            <div>

                                                <div class="icon"></div>

                                                <h6>Nee</h6>

                                            </div>

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <!-- text -->

                            <div class="group text texttwee" data-id="item10">

                                <h3>Titels Twee</h3>

                                <div class="form" data-design-key="text">

                                    <div class="field text">

                                        <input type="text" id="text[theadline]" name="text[theadline]"
                                            placeholder="Kop toevoegen" value="Lorem ipsum dolor sit amet">
                                    </div>

                                    <div class="field text">
                                        <input type="text" id="text[tsubtitle]" name="text[tsubtitle]"
                                            placeholder="Ondertitel toevoegen" value="Your Name">
                                    </div>
                                    <div class="field-wrapper field_set_one">
                                        <div class="field text">
                                            <input type="text" id="text[valueone]" name="text[valueone]"
                                                placeholder="Waarde Een" value="37km">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labelone]" name="text[labelone]"
                                                placeholder="Label één" value="Distance">
                                        </div>
                                    </div>
                                    <div class="field-wrapper field_set_one">
                                        <div class="field text">
                                            <input type="text" id="text[valuetwo]" name="text[valuetwo]"
                                                placeholder="Waarde Twee" value="Value 2">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labeltwo]" name="text[labeltwo]"
                                                placeholder="Label Twee" value="Label 2">
                                        </div>
                                    </div>
                                    <div class="field-wrapper field_set_two">
                                        <div class="field text">
                                            <input type="text" id="text[valuethree]" name="text[valuethree]"
                                                placeholder="Waarde Drie" value="Value 3">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labelthree]" name="text[labelthree]"
                                                placeholder="Label Drie" value="Label 3">
                                        </div>
                                    </div>
                                    <div class="field-wrapper field_set_two">
                                        <div class="field text">
                                            <input type="text" id="text[valuefour]" name="text[valuefour]"
                                                placeholder="Waarde Vier" value="Value 4">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labelfour]" name="text[labelfour]"
                                                placeholder="Label Vier" value="Label 4">
                                        </div>
                                    </div>
                                    <div class="field-wrapper field_set_three">
                                        <div class="field text">
                                            <input type="text" id="text[valuefive]" name="text[valuefive]"
                                                placeholder="Waarde Vijf" value="Value Five">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labelfive]" name="text[labelfive]"
                                                placeholder="Label Vijf" value="Label Five">
                                        </div>
                                    </div>
                                    <div class="field-wrapper field_set_three">
                                        <div class="field text">
                                            <input type="text" id="text[valuesix]" name="text[valuesix]"
                                                placeholder="Waarde Zes" value="Value Six">
                                        </div>
                                        <div class="field text">
                                            <input type="text" id="text[labelsix]" name="text[labelsix]"
                                                placeholder="Label Zes" value="Label Six">
                                        </div>
                                    </div>

                                </div>
                                <div class="field">
                                <div class="note">Om labels van jouw poster te verwijderen, verwijder je eenvoudig de tekst uit het veld.</div>
                                </div>
                                
                            </div>
                            <div class="group text textdrie" data-id="item11">

                                <h3>Titels</h3>

                                <div class="form" data-design-key="text">

                                    <div class="field text">

                                        <input type="text" id="text[ttheadline]" name="text[tttheadline]"
                                            placeholder="Titel" value="Titel" class=" theme3_text" data-value="tttheadline">
                                    </div>

                                    <div class="field text">
                                        <input type="text" id="text[ttsubtitle]" name="text[tttsubtitle]"
                                            placeholder="Subtitel" value="" class=" theme3_text" data-value="tttsubtitle">
                                    </div>
                                    <div class="field text">
                                        <input type="text" id="text[coordinaten]" name="text[coordinaten]"
                                            placeholder="Waarde één" value="" class=" theme3_text" data-value="tcoordinaten">
                                    </div>
                                    <div class="field text">
                                        <input type="text" id="text[ras]" name="text[ras]"
                                            placeholder="Waarde twee" value="" class=" theme3_text" data-value="tras">
                                    </div>
                                   
                                </div>
                                <div class="field">
                                <div class="note">Om labels van jouw poster te verwijderen, verwijder je eenvoudig de tekst uit het veld.</div>
                                </div>
                                
                            </div>
                          
                            


                        <!-- Bottom button -->

                        <div class="bottom-button">

                        <a class="apply-btn button small"> Toepassen</a>

                        <!-- <a class="cancel-btn button small"> Annuleren</a> -->

                        </div>

                        </div>



                        </div>

                    <footer>

                        <div class="prompt display">Scroll naar beneden voor meer opties</div>

                        <div class="inline">

                            <div class="order">

                                <span class="size">A3</span>

                                <span class="price">74.95</span>

                                <span class="shipping">Inclusief GRATIS verzending</span>

                            </div>

                            <div class="action">

                                <a class="button large tertiary editor" data-action-target="option_toggle">Editor</a>

                                <a class="button large primary review" data-view-target="review"
                                    id="downloadLink">PREVIEW</a>
                                


                            </div>

                        </div>

                    </footer>

                </section>

            </div>

        </section>

        <section class="stage review" data-view-source="review">

            <div class="scroll">

                <section class="step review display">

                    <header>

                        <div class="title">

                            <a class="previous apply-btn" data-action-target="review_modify"></a>

                            <h2>PREVIEW & GOEDKEUREN</h2>

                        </div>

                    </header>

                    <div class="content">

                        <aside class="note info">

                            <h4>Check jouw design</h4>

                            <p>We nemen geen verantwoordelijkheid voor onjuist ingevoerde informatie. Vanwege onze
                                snelle doorlooptijd kunnen we het ontwerp na bestelling niet meer wijzigen</p>

                        </aside>

                        <ul>

                            <li><span class="emoji">📦</span> Gratis verzending binnen Nederland en België</li>

                            <li><span class="emoji">🚴‍♂️</span> Levering binnen 3 werkdagen</li>



                        </ul>

                        <div class="get-in-touch-bottom text text-center">

                            <h2>VRAGEN?</h2>

                            <div class="svg-container">



                            </div>

                            <a class="button large tertiary mt-3 custom-outline-button"
                                href="<?php echo site_url(); ?>/contact" target="_blank">NEEM CONTACT OP</a> </p>

                        </div>

                    </div>

                    <footer>

                        <div class="field toggle">

                            <input type="checkbox" id="confirm" name="confirm">

                            <label for="confirm">Ik heb het ontwerp goedgekeurd</label>

                        </div>

                        <div class="action">

                            <a class="button large tertiary edit" data-action-target="review_modify">BEWERKEN</a>

                            <a class="button large primary checkout disabled add-to-cart-d">AFREKENEN</a>
                            <?php if ( current_user_can( 'administrator' ) ) {  ?>
                                <a class="button large primary admin_save" id="admin_save">Admin Save</a>
                            <?php } ?>

                        </div>

                    </footer>

                </section>

            </div>

        </section>

    </aside>

    <main>



        <!-- preview -->

        <section class="preview" id="preview_content">

            <section class="poster">

                <span class="width sizes">21 CM or 11.7 IN</span>

                <span class="height sizes">29.7 CM or 16.5 IN </span>

                <section class="layer map">



                    <!-- basemap -->

                    <!-- iframe -->

                    <iframe class="basemap" src="https://mapeditor.arhamsoft.info/basemap/?_=<?php echo rand(); ?>"
                        frameborder="0" id="my_map_box"></iframe>



                </section>

                <section class="layer overlay"></section>

                <section class="layer activity">



                    <!-- point -->

                    <div class="point clone"></div>



                    <!-- basemap -->

                    <!-- iframe -->

                    <iframe class="basemap" src="https://mapeditor.arhamsoft.info/basemap/?_=<?php echo rand(); ?>"
                        frameborder="0"></iframe>



                </section>

                <section class="layer label main-map-label">



                    <!-- marker -->

                    <div class="marker clone">

                        <div class="label">

                            <div class="anchor"></div>

                            <div class="text"></div>

                        </div>

                    </div>



                    <!-- basemap -->

                    <!-- iframe -->

                    <iframe class="basemap" src="https://mapeditor.arhamsoft.info/basemap/?_=<?php echo rand(); ?>"
                        frameborder="0"></iframe>



                </section>

                <section class="layer outline"></section>
                <section class="layer frame_poster_border"></section>

                <section class="layer elevation elevationone"></section>

                <section class="layer text themeonetext" id="layer_text">

                    <div class="headline"></div>

                    <div class="subtitle"></div>

                    <div class="footnote"></div>

                    <div class="metadata"></div>

                </section>
                <?php if(!empty($event_map_info->event_logo) && isset($event_map_info->event_logo)) { ?>
                    <section class="layer event_logo <?php echo $event_map_info->event_logo_dir; ?>" style="background-image: url(<?php echo get_site_url().'/wp-content/uploads/gpx-files/logo/'.$event_map_info->event_logo; ?>);  "></section>
                <?php } ?>

                
                <div class="layout2">
                        <section class="layer  elevationtwo style2"></section>
                        <section class="layer labels style2">
                            <section class="print-details-inner text ">
                                <div class="print-details-titles">
                                    <div class="stitle headline theadline"></div>
                                    <div class="subtile subtitle tsubtitle"></div>
                                </div>
                                <div class="print-details-labels">
                                    <div class="item label_set_one">
                                        <div class="value valueone"><div> value</div></div>
                                        <div class="label labelone"><div>label</div></div>
                                    </div>
                                    <div class="item label_set_one">
                                        <div class="value valuetwo"><div>value</div></div>
                                        <div class="label labeltwo"><div>label</div></div>
                                    </div>
                                    <div class="item label_set_two">
                                        <div class="value valuethree"><div>value</div></div>
                                        <div class="label labelthree"><div>label</div></div>
                                    </div>
                                    <div class="item label_set_two">
                                        <div class="value valuefour"><div>value</div></div>
                                        <div class="label labelfour"><div>label</div></div>
                                    </div>
                                    <div class="item label_set_three">
                                        <div class="value valuefive"><div>value</div></div>
                                        <div class="label labelfive"><div>label</div></div>
                                    </div>
                                    <div class="item label_set_three">
                                        <div class="value valuesix"><div>value</div></div>
                                        <div class="label labelsix"><div>label</div></div>
                                    </div>
                                </div>
                            </section>
                        </section>
                </div>
                <div class="layout2 layout3">
                        <section class="layer  elevationthree style2"></section>
                        <section class="layer labels style2">
                            <section class="print-details-inner text ">
                                <div class="print-details-titles">
                                    <div class="stitle headline ttheadline tttheadline">Mijn onvergetelijke avontuur</div>
                                    <div class="subtile subtitle ttsubtitle tttsubtitle">Mijn onvergetelijke</div>
                                    <div class="coordinaten coordinates tcoordinaten">52.3676N / 4.9041E</div>
                                    <div class="ras race tras">Marthon</div>
                                </div>
                               
                            </section>
                        </section>
                </div>

            </section>

        </section>



        <!-- control -->

        <section class="control">

            <a class="pill center" data-action-target="activity_bound"></a>

            <a class="pill scale" data-action-target="poster_scale_toggle"></a>

            <div class="zoom">

                <a class="positive" data-zoom-action="positive"></a>

                <a class="negative" data-zoom-action="negative"></a>

            </div>

        </section>



        <!-- credit -->

        <!-- <section class="credit"></section> -->

    </main>

</div>

<aside class="alert">

    <div class="item clone">

        <h6></h6>

        <p></p>

    </div>

</aside>









<?php }

function map_editor_events() { ?>
<?php 
    global $wpdb;
    $wie_gpx = $wpdb->prefix.'admin_wie_gpx ';
    $sql = "SELECT * FROM $wie_gpx WHERE is_active = 1 ORDER BY id DESC";
    $results = $wpdb->get_results($sql, ARRAY_A);
			
?>
<section>
    <div class="events-header">
        <h1>Evenementen</h1>
        <p>Selecteer je evenementorganisator om aan de slag te gaan</p>
    </div>
    <ul class="events-list">
    <?php
    $args = [
        'posts_per_page' => -1,
        'post_type'=>'events',
        'orderby'=>'title',
        'order'=>'DESC'
    ];

    $loop = new WP_Query( $args );  
    if($loop->have_posts()) :                                         
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li class="events-item">
            <a  target="_blank" href="<?php echo get_the_permalink(); ?>">
                <div>
                    <figure class="map-event-img">
                        <?php  if( has_post_thumbnail() ) {
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($loop->ID), 'full', false, '' );
                        echo '<img src="'.$src[0].'">';
                        } else { ?>
                            <img src="<?php echo get_site_url().'/wp-content/uploads/gpx-files/default.jpg'; ?>">
                        <?php } ?>
                    </figure>
                </div>
                <h3> 
                 <?php if(get_the_title()) { 
                    echo get_the_title(); 
                 } else {
                    echo 'No Title'; 
                 }  ?>
            </h3>
            </a>
         
        </li>
        <?php endwhile; 
	endif;  
	wp_reset_postdata(); ?>
    </ul>
</section>
<?php }
add_shortcode('map_editor_events' , 'map_editor_events');