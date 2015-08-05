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
        return $app['twig']->render('resume.html.twig');

    });

    $app->post("/create_job", function() use ($app) {
        $job = new Job($_POST['company'],$_POST['title'],$_POST['start_date'],$_POST['end_date'],$_POST['address'],$_POST['salary']);
        $job->save();
        return $app['twig']->render('create_job.html.twig', array('newjob' => $job));
    });

    return $app;

?>

private $company;
private $title;
private $start_date;
private $end_date;
private $address;
private $salary;
