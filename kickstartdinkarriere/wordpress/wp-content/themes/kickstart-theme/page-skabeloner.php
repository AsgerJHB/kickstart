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
          padding-inline: 8px;
          max-width: 1200px;
          margin-inline: auto;
        }
        
      #content_skabeloner {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(375px, 1fr));
        gap: 36px 24px;
        padding: 40px;
      }

      /* ----- filter knapper ---- */
        .filter-btn {
        border: solid 1px #E6C375 !important;
        background-color: white !important;
        color: #E6C375 !important;
      }

      .filter-btn:hover {
        border: solid 1px #f0c259 !important;
        background-color: #f0c259 !important;
        color: white !important;
      }

         .filter-btn.selected {
        border: solid 1px #E6C375 !important;
        background-color: #E6C375!important;
        color: white !important;
      }

      #filter {
        display:flex;
        align-items:center;
        justify-content: space-between;
        flex-direction: row;
        margin: 2em;
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
        transition: 0.3s box-shadow, 0.5s transform;
  
      }

      .kort_beskrivelse {
        position: relative;
      }

      .kort_beskrivelse::after {
        content: "Læs mere";
        text-decoration: underline;
        padding-left: 0.25rem;
        position: absolute;
        left: 0;
        bottom: -1.5rem;
      }


    </style>

        <template>
            <article class="skabelon_indhold">
              <img src="" alt="" class="billede">
                <h3 class="overskrift"></h3>
                <p class="kort_beskrivelse"></p>
                <p class="pris"></p>
                <p class="kategori"></p>
            </article>
        </template>

        <main id="main_content">

        <div class="intro">
        <p>
        CV skabeloner tekst
        </p>
        </div>

        <div id="filter_menu">
            <h3 class="filtrerh3">Filtrer CV-Skabelonerne</h3>
            <div id="filter">
            <button class="filter-btn selected" data-category="alle">Alle</button>
            <button class="filter-btn" data-category="simpel">Simpel</button>
            <button class="filter-btn" data-category="farverig">Farverig</button>
            <button class="filter-btn" data-category="formel">Formel</button>
            <button class="filter-btn" data-category="kreativ">Kreativ</button>
            </div>
        </div>
        <section id="content_skabeloner">

        </section>
        </main>

    <script>
      const url = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/skabelon?per_pages=100"; //wp-json

      // se om DOM er loaded
document.addEventListener("DOMContentLoaded", start);
let skabeloner = [];
let filter = "alle";

// første funktion der kaldes efter DOM er loaded
function start() {
  const filterKnapper = document.querySelectorAll(".filter-btn");
  filterKnapper.forEach((knap) =>
    knap.addEventListener("click", filtrerSkabeloner)
  );
  hentData();
}
// eventlistener knyttet til knapperne der vælger hvad for et filter der er aktivt
function filtrerSkabeloner() {
  filter = this.dataset.kategori;
  console.log("filter", filter);
  visSkabeloner();
  header.textContent = this.textContent;
}

async function hentData() {
  let response = await fetch(url);
  skabeloner = await response.json();
  visSkabeloner();
}
// Funktion der viser retter i listeview
function visSkabeloner() {
  const mainContent = document.getElementById("content_skabeloner");
        const template = document.querySelector("template").content;
        mainContent.textContent = ""; //fjerner sektionens indhold

  // ind til loop view + lyt efter om der er blevet klikket
  skabeloner.forEach((skabelon) => {
    console.log("kategori", skabelon.kategori);
    if (filter == skabelon.kategori || filter == "alle") {
      //hvis objektet har samme værdi som filterknappen
      const clone = template.cloneNode(true);
            clone.querySelector(".billede").src=`${skabelon.billede.guid}`;
            clone.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
            clone.querySelector(".kort_beskrivelse").textContent = `${skabelon.kort_beskrivelse}`;
            clone.querySelector(".pris").textContent = `${skabelon.pris}`;
            clone.querySelector(".kategori").textContent = `${skabelon.kategori}`;
            clone.querySelector("article").addEventListener("click", () => location.href = `${skabelon.link}`); //gør det klikbart og kalder på showPopUp() funktionen som parameter
            mainContent.appendChild(clone);
    }
  });
}
    </script>
    </div>


<?php get_footer();
