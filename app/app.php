<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Job.php";

    session_start();
    if (empty($_SESSION['list_of_jobs'])) {
        $_SESSION['list_of_jobs'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));


    $app->get("/", function() use ($app) {
            return $app['twig']->render('resume.html.twig', array('resume' => Job::getAll()));
    });

    $app->get("/create_job", function() use ($app) {
        return $app['twig']->render('create_job.html.twig');
    });

    $app->post("/job_created", function() use ($app) {
        $job = new Job($_POST['company'],$_POST['title'],$_POST['start_date'],$_POST['end_date'],$_POST['address'],$_POST['salary']);
        $job->save();
        return $app['twig']->render('job_created.html.twig', array('newjob' => $job));
    });


    // We don't need to make a new page, just clear the resume and display the / page.
    $app->get("/clear_resume", function() use ($app) {
        Job::deleteAll();
        return $app['twig']->render('resume.html.twig', array('resume' => array()));
    });


    return $app;

?>
