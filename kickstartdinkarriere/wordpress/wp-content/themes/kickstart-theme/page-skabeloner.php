<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main' ); ?> role="main">
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>
	<div class="page-content">
		<style></style>

        <template>
            <article class="skabelon_indhold">
                <div class="billede"></div>
                <h3 class="overskrift"></h3>
                <p class="kort_beskrivelse"></p>
                <p class="pris"></p>
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
      const url = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/skabelon?per_page=100"; //wp-json

      let skabeloner; //json databasen
      let filter = "alle"; //variabel som ændrer sig alt efter hvilken filterknap du klikker på

      document.addEventListener("DOMContentLoaded", () => {
        //venter indtil siden er loadet før knapperne bliver funktionelle
        const filterButtons = document.querySelectorAll(".filter-btn");
        filterButtons.forEach((button) => {
          button.addEventListener("click", filterKategori); //knapperne kalder på filterKategori() funktionen, når man klikker
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
          if (filter == "alle" || filter == skabelon.simpel || filter == skabelon.farverig || filter == skabelon.formel || filter == skabelon.kreativ) {
            //hvis objektet har samme værdi som filterknappen
            const clone = template.cloneNode(true);
            clone.querySelector(".billede").`url(${skabelon.billede.guid})`;
            clone.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
            clone.querySelector(".kort_beskrivelse").textContent = `${skabelon.kortbeskrivelse}`;
            clone.querySelector(".pris").textContent = `${skabelon.pris}`;
            clone.querySelector("article").addEventListener("click", () => location.href = `${skabelon.link}`); //gør det klikbart og kalder på showPopUp() funktionen som parameter
            mainContent.appendChild(clone);
          }
        });
      }

    </script>
    </div>
</main>

	<?php
endwhile;