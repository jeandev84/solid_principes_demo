<?php


/*
S ( SRP : Simple Responsibility Principe )

Принцип единственной обязанности (ответственности)
Любой объект должен иметь лишь одна объязанность, и это объязанность должна полностью реализованна в классе объекта.
Это следует что у нас должна всего лишь одна причина чтобы выносить изменения в классе объекта.
*/


/**
 * @User
*/
class User
{

        /**
         * @var int
        */
        protected $id;


        /**
         * @var string
        */
        protected $email;



        /**
         * @var string
        */
        protected $name;



        /**
         * @var string
        */
        protected $firstname;



        /**
          * @var
        */
        protected $patronymic;



        /**
         * @var string
        */
        protected $password;



        /**
         * @var bool
        */
        protected $enabled = true;



        /**
         * @return int
        */
        public function getId(): int
        {
            return $this->id;
        }


        /**
         * @return string
        */
        public function getEmail(): string
        {
            return $this->email;
        }



        /**
         * @param string $email
         * @return User
        */
        public function setEmail(string $email): self
        {
            $this->email = $email;

            return $this;
        }



        /**
         * @return string
        */
        public function getPassword(): string
        {
            return $this->password;
        }


        /**
         * @param string $password
         * @return User
        */
        public function setPassword(string $password): self
        {
            $this->password = $password;

            return $this;
        }



        /**
         * @return bool
        */
        public function isEnabled(): bool
        {
            return $this->enabled;
        }



        /**
         * @param bool $enabled
         * @return User
        */
        public function setEnabled(bool $enabled): self
        {
            $this->enabled = $enabled;

            return $this;
        }



        /**
         * @return string
        */
        public function getName(): string
        {
            return $this->name;
        }



        /**
         * @param string $name
         * @return User
        */
        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }



        /**
         * @return string
         */
        public function getFirstname(): string
        {
            return $this->firstname;
        }

        /**
         * @param string $firstname
         * @return User
         */
        public function setFirstname(string $firstname): self
        {
            $this->firstname = $firstname;

            return $this;
        }



        /**
         * @return string
         */
        public function getPatronymic(): string
        {
            return $this->patronymic;
        }



        /**
         * @param string $patronymic
         * @return User
        */
        public function setPatronymic(string $patronymic): self
        {
            $this->patronymic = $patronymic;

            return $this;
        }


        /**
         * @return string
        */
        public function getFullName(): string
        {
            return implode([
                $this->firstname,
                $this->name,
                $this->patronymic
            ]);
        }


        /*
        public function save()
        {
            // save user
           $this->email = 'jean@ymail.com';
        }


        public function delete()
        {
           // todo implements
        }
        */

}


/**
 * @UserManager
*/
class UserManager
{

      // EntityManager
      protected $em;



      /**
       * @param EntityManager $em
      */
      public function __construct(EntityManager $em)
      {
           $this->em = $em;
      }


      /**
       * @param User $user
       * @return void
      */
      public function save(User $user)
      {
           // store user attributes into database

           if (! $user->getId()) {
               $this->em->persist($user);
           }

           $this->em->flush();
      }



      /**
       * @param User $user
       * @return void
      */
      public function delete(User $user)
      {
          // delete user from database
          $this->em->remove($user);
          $this->em->flush();
      }


      public function retrieve(User $user)
      {
          // find user from database
          // $user = $this->em->getRepository(User::class)->findOneById($user->getId());
          $user = $this->em->getRepository(User::class)->findBy(['id' => $user->getId()]);

          return $user ?? false;
      }
}


/**
 * @EntityManager
*/
class EntityManager {

      public function persist($object)
      {
          // save attached object
      }


      public function remove($object)
      {
           // remove attached object
      }

      public function flush()
      {
           // transaction,
           // begin transaction
           // commit changes
           // rollback
      }


      /**
       * @param string $entityName
       * @return EntityRepository
      */
      public function getRepository(string $entityName): EntityRepository
      {
           $repositoryName = sprintf('%sRepository', $entityName);

           return new $repositoryName($this);
      }
}


/**
 *
*/
class EntityRepository
{
     public function findBy(array $criteria): array
     {
          return [];
     }

     public function findAll(): array
     {
          return [];
     }
}