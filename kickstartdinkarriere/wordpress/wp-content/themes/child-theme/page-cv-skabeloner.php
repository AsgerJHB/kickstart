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


	

	<div id="filter_menu">
      <h3 class="filtrer_h3">Filtrer cv-skabelonerne</h3>
        <div id="filter">
          <button class="filter-btn selected" data-category="alle">Alle</button>
          <button class="filter-btn" data-category="simpel">Simpel</button>
		  <button class="filter-btn" data-category="farverig">Farverig</button>
		  <button class="filter-btn" data-category="formelt">Formelt</button>
		  <button class="filter-btn" data-category="kreativ">Kreativ</button>
        </div>
    </div>

	  <style>
		.page-content {
		background-color: #adbbad;}
	
	</style>

	<script>	
    	const url = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/cv-skabelon?per_page=100";//wp-json
		
		let cv-skabeloner; //json databasen
      	let filter = "alle"; //variabel som ændrer sig alt efter hvilken filterknap du klikker på

		document.addEventListener("DOMContentLoaded", () => {
        //venter indtil siden er loadet før knapperne bliver funktionelle
        const filterButtons = document.querySelectorAll(".filter-btn");
        filterButtons.forEach((button) => {
          button.addEventListener("click", filterCV); //knapperne kalder på filterCV() funktionen, når man klikker
        }); 
        fetchData(); //kalder på fetchData() funktionen
      });

		async function fetchData() {
        //kaldes når siden er loadet
        let response = await fetch(url);
        cv-skabeloner = await response.json();
        display(cv-skabeloner); //kalder på display() funktionen med projekter som parameter
        //console.log(projekter);
      }

		function filterCV() {
        //bliver kaldt når knapperne klikkes på
        filter = this.dataset.category; //variablen ændres til den knap man klikker på
        document.querySelector(".selected").classList.remove("selected");
        this.classList.add("selected");
        display(); //kalder på display() funktionen
      }

	  function display() {
        //kaldes når databasen er hentet eller når en filterknap klikkes
        const mainContent = document.getElementById("content_cv-skabeloner");
        const template = document.querySelector("template").content;
        mainContent.textContent = ""; //fjerner sektionens indhold

        CV-skabeloner.forEach((cv-skabelon) => {
          if (filter == "alle" || cv-skabelon.overskrift == "n/a" || cv-skabelon.overskrift) {
            //hvis objektet har samme værdi som filterknappen
            const clone = template.cloneNode(true);
			clone.querySelector(".billede").style.backgroundImage = `url(${cv-skabelon.billede.guid})`;
            clone.querySelector(".cv-skabelon_titel").textContent = `${cv-skabelon.title.rendered}`;
            clone.querySelector(".kort_beskrivelse").textContent = `${cv-skabelon.kortbeskrivelse}`;
            clone.querySelector("article").addEventListener("click", () => location.href = `${projekt.link}`); //gør kortene klikbart og kalder på showPopUp() funktionen med city som parameter
            mainContent.appendChild(clone);
          }
        });

	</script>



















		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;
