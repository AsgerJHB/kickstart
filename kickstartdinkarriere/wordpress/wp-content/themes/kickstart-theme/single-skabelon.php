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

get_header(); ?>

<div id='page-content' class="page-content"> 
      <style>

        h1, h2, h3, p {
          text-align: left !important;
        }

        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        img {
          width: 100%;
          object-fit: cover;
        }

        #back {
          padding: 4px 12px;
          font-size: 32px;
          font-weight: bolder;
          cursor: pointer;
          color: #000000;
          aspect-ratio: 1/1;
          width: 51px;
          background-color: transparent;
          z-index: 101;
        }

        #main_content {
          padding-inline: 8px;
          max-width: 1200px;
          margin-inline: auto;
        }

        #single_post {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 40px;
        }

        @media (max-width: 640px) {
          #single_post {
            display: block;
          }
        }

        .article_gap {
          margin-top: 3rem;
        }

        [data-type="group"] p {
          text-align: center !important;
        }

      </style>

      <main id="main_content">
        <div id="back">&#x2715;</div>
        <h2 class="overskrift"></h2>
        <section id="single_post">
          <div class="col_left">
            <p class="lang_beskrivelse"></p>
          </div>
          <div class="col_right">
            <img class="billede" src="" alt="">
          </div>
          <article class="article_gap">
              <h3 class="pris_text">Pris for CV-Skabelon</h3>
              <p class="pris"></p>
            </article>
            <article class="article_gap">
              <h3 class="køb">Køb CV-Skabelon Her!</h3>
              <button>Køb Her!</button>
            </article>
      	</section>
      </main>

      <script>
        let skabelon;
			  document.addEventListener("DOMContentLoaded", fetchData);
			
			  async function fetchData() {
				  let jsonData = await fetch(`http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/skabelon?per_page=100/<?php echo get_the_ID() ?>`);
				  skabelon = await jsonData.json();
			  	display();
			  }
			
			  function display() {
				document.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
				document.querySelector(".lang_beskrivelse").textContent = `${skabelon.lang_beskrivelse}`;
          		document.querySelector(".billede").src = `${skabelon.billede.guid}`;
				document.querySelector(".pris").textContent = `${skabelon.pris}`; 
			  }

		  	document.getElementById("back").addEventListener("click", () => {
			  	location.href = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/skabeloner/";
		  	});

      </script>
    </div>

	<?php get_footer(); ?>
