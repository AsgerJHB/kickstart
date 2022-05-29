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
hej med dig

 <template>
    <article class="skabelon">
        <div class="img"></div>
        <h3 class="overskrift"></h3>
        <p class="kort_beskrivelse"></p>
    	<p class="pris"></p>
    </article>
</template>

	

	<div id="filter_menu">
      <h3 class="filtrer_h3">Filtrer CV-skabelonerne</h3>
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
		
		let skabeloner; //json databasen
      	let filter = "alle"; //variabel som ændrer sig alt efter hvilken filterknap du klikker på

		async function fetchData() {
        //kaldes når siden er loadet
        let response = await fetch(url);
        skabeloner = await response.json();
        visSkabeloner();
      }

	  function visSkabeloner(){
		const template = document.querySelector("template").content;
		  console.log(skabeloner);
		  
	 skabeloner.forEach(skabelon =>{
			const klon = template.cloneNode(true).content;
			clone.querySelector(".img").style.backgroundImage = `url(${skabelon.billede.guid})`;
            clone.querySelector(".overskrift").textContent = `${skabelon.title.rendered}`;
            clone.querySelector(".kort_beskrivelse").textContent = `${skabelon.kortbeskrivelse}`;
            clone.querySelector(".pris").textContent = `${skabelon.pris}`;
            clone.querySelector("article").addEventListener("click", () => location.href = `${skabelon.link}`); //gør det klikbart og kalder på showPopUp() funktionen med city som parameter
            mainContent.appendChild(clone);
		  })
	  }

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
