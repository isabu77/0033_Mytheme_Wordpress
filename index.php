<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- titre du site dans wordpress -->
    <title><?= bloginfo('name'); ?></title>
    <!-- emplacement du style.css dans wordpress -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');  ?>" type="text/css" />
    <!-- fonction pour intégrer le header de wordpress-->
    <?php wp_head(); ?>
</head>

<body>
    <header id="header">
        <h1><?php echo bloginfo('name'); ?></h1>
        <nav id="navigation">

        </nav>
    </header>
    <div id="wrap">
        <section id="content">
            <!-- verifier s'il y a des posts -->
            <?php if (have_posts()) : ?>
                <div id="loop">
                    <!-- bouce sur les posts -->
                    <?php while (have_posts()) : the_post(); ?>

                        <article>
                            <h1><?php the_title(); ?></h1>
                            <!-- post ou page ? -->
                            <p>publié le <?php the_time('d/m/y'); ?><?php if (!is_page()) : ?> dans <?php the_category(', '); ?><?php endif; ?> 
                            </p>
                            <?php if (!is_singular()) : ?>
                            <?php the_content(); ?> 

                            <?php else: ?> 
                                <?php the_excerpt(); ?> 
                                <a href="<?php the_permalink(); ?>"> lie la suite </a>
                            <?php endif; ?> 
                        </article>
                    <?php endwhile; ?>

                </div>

            <?php else : ?>
                <p>aucun résultat</p>
            <?php endif; ?>

        </section>

        <aside id="sidebar">

        </aside>
    </div>

    <footer id="footer">

    </footer>
    <!-- pour intégrer le js -->
    <?php wp_footer(); ?>

</body>

</html>