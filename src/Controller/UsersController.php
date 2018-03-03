<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Users;

class UsersController extends Controller
{
    const RU_FIELDS = [
        'ID',
        'E-Mail',
        'Страна',
        'Имя',
        'Состояние пользователя'
    ];
    const DB_FIELDS = [
        'users.id',
        'users.email',
        'users_about.item = "country" && users_about.value',
        'users_about.item = "firstname" && users_about.value',
        'users_about.item = "state" && users_about.value'
    ];

    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        $users = $this->findByQuery($_POST['query']);

        return $this->render('users/index.html.twig', [
            'users' => $users, 'query' => $_POST['query']
        ]);
    }

    public function findByQuery(string $query)
    {
        $query = str_replace(self::RU_FIELDS, self::DB_FIELDS, $query);
        $query = preg_replace('/\s?(\!?\=)\s?([^ \)"]+)/', ' $1 "$2"', $query);
        $query = str_replace(['ИЛИ', 'И'], ['OR', 'AND'], $query);
        $select = 'SELECT users.id, users.email, users.role, users.reg_date';
        $join   = 'LEFT JOIN users_about ON users.id = users_about.user';
        $group  = 'GROUP BY users.id';
        $manager = $this->getDoctrine()->getManager();
        $connection = $manager->getConnection();
        $statement = $connection->prepare($select . ' FROM users ' . $join . ' WHERE ' . $query . ' ' . $group);
        $statement->execute();
        return $statement->fetchAll();
    }
}
