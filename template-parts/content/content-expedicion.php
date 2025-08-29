<?php

/**
 * Template part for displaying single "Expedicion" custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

include_once(__DIR__ . '/../../inc/expedicion-functions.php');

$expedicion = armch_get_expedicion(get_the_ID());
?>

<article id="post-<?php the_ID(); ?>" <?php armch_content_class(); ?>>
	<header>
		<?php the_title('<h1 class="expedicion-title">', '</h1>'); ?>
	</header><!-- .expedicion-title -->

	<div class="expedicion-content grid grid-cols-1 md:grid-cols-3 gap-6">
		<div class="main-info md:col-span-2">
			<img src="<?php echo $expedicion['feat_img']; ?>" class="!mt-0" />

			<?php echo ($expedicion['descripcion']) ? wp_kses_post($expedicion['descripcion']) : 'No había descripción'; ?>

			<?php if ($expedicion['itinerario']): ?>
				<h2>Itinerario</h2>
				<?php echo wp_kses_post($expedicion['itinerario']); ?>
			<?php endif; ?>

			<?php
			$gallery = get_field('media');
			if ($gallery) echo apply_filters('the_content', $gallery->post_content);
			?>

			<?php if ($expedicion['observaciones']): ?>
				<h2>Observaciones generales</h2>
				<?php echo wp_kses_post($expedicion['observaciones']); ?>
			<?php endif; ?>

			<?php if ($expedicion['recomendaciones']): ?>
				<h2>Recomendaciones</h2>
				<?php
				$recomendaciones = get_page_by_path('recomendaciones');

				echo $recomendaciones->post_content;
				?>
			<?php endif; ?>
		</div><!-- .main-info -->

		<div class="plus-info prose-headings:m-0">
			<div id="info-misc" class="flex flex-col p-4 mb-6 bg-secondary text-primary gap-6 prose-headings:mb-1 prose-headings:pb-1 prose-headings:border-b prose-headings:border-b-slate-700 prose-headings:text-primary">
				<?php if ($expedicion['costos']): ?>
					<div>
						<h2>Costo</h2>
						<?php echo $expedicion['costos']; ?>
					</div>
				<?php endif; ?>

				<?php if ($expedicion['dificultad']['label']): ?>
					<div>
						<h2>Dificultad</h2>
						<?php echo $expedicion['dificultad']['label']; ?>
					</div>
				<?php endif; ?>

				<?php if ($expedicion['duracion']): ?>
					<div>
						<h2>Duración</h2>
						<?php echo wp_kses_post($expedicion['duracion']); ?>
					</div>
				<?php endif; ?>

				<?php if ($expedicion['temperaturas']): ?>
					<div>
						<h2>Temperaturas</h2>
						<?php echo wp_kses_post($expedicion['temperaturas']); ?>
					</div>
				<?php endif; ?>

				<?php if ($expedicion['altura']): ?>
					<div>
						<h2>Alturas</h2>
						<?php echo wp_kses_post($expedicion['altura']); ?>
					</div>
				<?php endif; ?>

				<?php if ($expedicion['cupo']): ?>
					<div>
						<h2>Cupo de participantes</h2>
						<?php echo wp_kses_post($expedicion['cupo']); ?>
					</div>
				<?php endif; ?>
			</div><!-- #info-misc -->

			<div id="info-equipos" class="bg-primary text-secondary prose-headings:text-secondary p-4">
				<?php if ($expedicion['equipamiento']): ?>
					<h2>Equipamiento necesario</h2>
					<?php echo wp_kses_post($expedicion['equipamiento']); ?>
				<?php endif; ?>

				<?php if ($expedicion['items_incluidos']): ?>
					<h2>Incluye</h2>
					<?php echo wp_kses_post($expedicion['items_incluidos']); ?>
				<?php endif; ?>

				<?php if ($expedicion['items_excluidos']): ?>
					<h2>No incluye</h2>
					<?php echo wp_kses_post($expedicion['items_excluidos']); ?>
				<?php endif; ?>

				<?php if ($expedicion['alimentacion']): ?>
					<div>
						<h2>Alimentación</h2>
						<?php echo wp_kses_post($expedicion['alimentacion']); ?>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- #info-equipos -->
	</div><!-- .expedicion-content -->
</article><!-- #post-${ID} -->