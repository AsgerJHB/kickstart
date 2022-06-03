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
          background-color: #ECEDE9; 
        }

        .container {
          max-width: 1200px;
          margin-inline: 20%;
        }

        #single_post {
          /* display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 40px; */
          display: flex;
          justify-content: space-between;
        }

        @media (max-width: 640px) {
          #single_post {
            display: block;
            flex-direction: column;
          }
          .prisogknap {
            margin-top: 2rem;
            margin-bottom: 2rem;
      }
      .container {
          max-width: 1200px;
          margin-inline: 5%;
        }
        }

        @media (max-width: 840px) {
        .container {
          margin-inline: 10%;
        }
      }

        .article_gap {
          margin-top: 2rem;
          margin-bottom: 4rem;
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 2rem;
        }

        [data-type="group"] p {
          text-align: center !important;
        }

      .koeb {
        background-color: #E6C375 !important;
        color: white !important;
        border: none;
        font-family: montserrat, sans-serif !important;
      }
      .koeb:hover {
        background-color: #6A7670 !important;
        color: white !important;
        border: none;
        font-family: montserrat, sans-serif !important;
      }

      .prisogknap {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
      }

      .overskrift {
        margin-bottom: 3.5rem;
      }

      .col_left {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
      }

      </style>

      <main id="main_content">
        <div class="container">
        <div id="back">&#x2715;</div>
        <h2 class="overskrift"></h2>
        <section id="single_post">
          <div class="col_left">
            <p class="lang_beskrivelse"></p>
            <div class="prisogknap">
              <p class="pris"></p>
              <button class="koeb">Køb Her!
                <p class="linkweb"></p>
              </button>
            </div>
          </div>
          <div class="col_right">
            <img class="billede" src="" alt="">
          </div>
          <!-- <article class="article_gap">
              <p class="pris"></p>
            </article> -->
            <article class="article_gap">
              <!-- <button class="koeb">Køb Her!
                <p class="linkweb"></p>
              </button> -->
            </article>
      	</section>
        </div>
      </main>

      <script>
        let skabelon;
			  document.addEventListener("DOMContentLoaded", fetchData);
			
			  async function fetchData() {
				  let jsonData = await fetch(`http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/skabelon/<?php echo get_the_ID() ?>`);
				  skabelon = await jsonData.json();
			  	display();
			  }
			
			  function display() {
				document.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
				document.querySelector(".lang_beskrivelse").innerHTML = `${skabelon.lang_beskrivelse}`;
          		document.querySelector(".billede").src = `${skabelon.billede.guid}`;
				document.querySelector(".pris").textContent = `${"Pris: " + skabelon.pris + " kr."}`; 
        document.querySelector(".koeb").addEventListener("click", () => location.href = `${skabelon.linkweb}`); 
            mainContent.appendChild(clone);
			  }

		  	document.getElementById("back").addEventListener("click", () => {
			  	location.href = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/skabeloner/";
		  	});

      </script>
    </div>

	<?php get_footer(); ?>
