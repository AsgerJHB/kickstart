<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="page-content">
		<style>
       * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      #main_content {
          background-color: #ECEDE9;
        }

        .filterp {
          padding-inline: 20%;
        }

      
         .intro {
          background-image: url(http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-content/uploads/2022/06/bolge_cv-2.webp);
          background-position-y: -280px;
          object-fit: cover;
          background-repeat: no-repeat;
          }
      

      #content_skabeloner {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(275px, 1fr));
        gap: 36px 24px;
        padding: 40px;
        max-width: 1200px;
        margin-inline: auto;
      }

      /* ----- filter knapper ---- */
        .filter-btn {
        border: solid 1px #e6c375 !important;
        background-color: #e6c375 !important;
        color: #E6C375 !important;
      }

      .filter-btn:hover {
        border: solid 1px #6A7670!important;
        background-color: #6a7670!important;
        color: white !important;
      }

         .filter-btn.selected {
        border: solid 1px #E6C375 !important;
        background-color: #E6C375!important;
        color: white !important;
      }

      #filter {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        flex-direction: row;
        margin-top: 3em;
        max-width: 700px;
        margin-inline: auto;
      }

      @media (max-width: 840px) {
        #content_skabeloner {
          grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }
      }

      .skabelon_indhold {
        display: grid;
        grid-template-rows: 4fr 5fr;
        aspect-ratio: 2/3;
        box-shadow: #80808040 2px 4px 8px 0px;
        cursor: pointer;
        transition: 0.3s box-shadow, 0.5s transform !important;
        overflow: hidden;
      }
      .skabelon_indhold:hover{
        transform: translateY(-10px);
        box-shadow: #80808080 2px 4px 16px 4px;
      }

      .kort_beskrivelse {
        position: relative;
        font-size: 0.9rem;
        margin-left: 1rem;
        margin-right: 1rem;
        text-align: center;
        color: #3F4F49;
      }

      .overskrift {
        font-size: 1.1rem;
        margin-top: 1rem;
        margin-bottom: 0;
        margin-left: 1rem;
        margin-right: 1rem;
        text-align: center;
        background-color: #D1D9D1;
        max-height: 1.5rem;
        align-content: center;
        padding: 1.5rem;
      }

      /* .kort_beskrivelse::after {
        content: "Læs mere";
        text-decoration: underline;
        padding-right: 0.5rem;
        position: absolute;
        right: 0;
        bottom: 0;
      } */

      .pris {
        left: 0;
        bottom: 0;
        color: #3F4F49;
      }

      .filterh1 {
        text-align: center;
        margin-top: 0;
        padding-top: 3.5rem;
      }

      .filterp {
        text-align: left;
        color: #3F4F49;
      }

      .disclaimer {
        text-align: center;
        align-items: center;
        margin-top: 0.5rem;
        color: black;
        font-size: 0.8rem;
      }

      .kort_indhold {
        display: grid;
        grid-template-rows: auto auto;
        background-color: white;
      }

      .billede_container {
        overflow: hidden;
      }

      .semere {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 1rem;
        margin-top: 0;
      }
      .button_skabeloner{
        background-color: #E6C375 !important;
        color: white !important;
        border: none;
       font-family: montserrat, sans-serif !important;
      }
      .button_skabeloner:hover{
        background-color: #6A7670 !important;
        color: white !important;
        border: none;
        font-family: montserrat, sans-serif !important;
      }

    </style>

        <template>
            <article class="skabelon_indhold">
              <div class="billede_container">
                <img src="" alt="" class="billede">
              </div>
              <div class="kort_indhold">
                <h3 class="overskrift"></h3>
                <p class="kort_beskrivelse"></p>
                <div class="semere">
                  <p class="pris"></p>
                  <button class="button_skabeloner">Læs mere</button>
                </div>
              </div>
            </article>
        </template>

        <main id="main_content">

        <div class="intro">
        <h1 class="filterh1">CV Skabeloner</h1>
        <p class="filterp">
          Dette er alle mine CV skabeloner. Hver af CV-skabelonerne er ekspert designet og følger de nøjagtige "cv-regler", som en kommende arbejdsplads kunne have til dig. Skil dig ud, og bliv ansat hurtigere med en super fed CV-skabeloner. Skriv til mig, hvis du er i tvivl om hvilken skabelon der passer til netop dig!
        </p>
        <p class="disclaimer">
          CV-skabelonerne købes hos eksterne udbydere
        </p>
        <!-- </div> -->

        <div id="filter_menu">
            <div id="filter">
            <button class="filter-btn selected" data-category="alle">Alle</button>
            <button class="filter-btn" data-category="simpel">Simpel</button>
            <button class="filter-btn" data-category="farverig">Farverig</button>
            <button class="filter-btn" data-category="formel">Formel</button>
            <button class="filter-btn" data-category="kreativ">Kreativ</button>
            </div>
        </div>
        </div>
        <section id="content_skabeloner">

        </section>
        </main>

    <script>
      const url = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/skabelon?per_page=100"; //wp-json

      let skabeloner; //json databasen
      let filter = "alle"; //variabel som ændrer sig alt efter hvilken filterknap du klikker på

      document.addEventListener("DOMContentLoaded", () => {
        //venter indtil siden er loadet før knapperne bliver funktionelle
        const filterKnapper = document.querySelectorAll(".filter-btn");
        filterKnapper.forEach((knap) => {
        knap.addEventListener("click", filterKategori); //knapperne kalder på filterKategori() funktionen, når man klikker
        }); 
        fetchData(); //kalder på fetchData() funktionen
      });

      async function fetchData() {
        //kaldes når siden er loadet
        let response = await fetch(url);
        skabeloner = await response.json();
        display(skabeloner); //kalder på display() funktionen med skabeloner som parameter
        console.log(skabeloner);
      }

      function filterKategori() {
        //bliver kaldt når knapperne klikkes på
        filter = this.dataset.category; //variablen ændres til den knap man klikker på
        console.log("filter", filter);
        document.querySelector(".selected").classList.remove("selected");
        this.classList.add("selected");
        display(); //kalder på display() funktionen
      }

      function display() {
        //kaldes når databasen er hentet eller når en filterknap klikkes
        const mainContent = document.getElementById("content_skabeloner");
        const template = document.querySelector("template").content;
        mainContent.textContent = ""; //fjerner sektionens indhold

        skabeloner.forEach((skabelon) => {
          // console.log("skabelon", skabelon.kategori);
          if (filter == skabelon.kategori || filter ==  "alle") {
            //hvis objektet har samme værdi som filterknappen
            const clone = template.cloneNode(true);
            clone.querySelector(".billede").src=`${skabelon.billede.guid}`;
            clone.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
            clone.querySelector(".kort_beskrivelse").textContent = `${skabelon.kort_beskrivelse}`;
            clone.querySelector(".pris").textContent = `${skabelon.pris + " kr."}`;
            // clone.querySelector(".kategori").textContent = `${skabelon.categories}`;
            clone.querySelector("article").addEventListener("click", () => location.href = `${skabelon.link}`); //gør det klikbart og kalder på showPopUp() funktionen som parameter
            mainContent.appendChild(clone);
          }
        });
      }

    </script>
    </div>


<?php get_footer();
