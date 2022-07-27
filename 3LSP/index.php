<?php

/*
 L - Liskov Substitution Principe (LSP)
 Принцип подстановки Барбары Лисков
*/

interface CoffeeMachineInterface {
    public function brewCoffee($selection);
}


class BasicCoffeeMachine implements CoffeeMachineInterface {

    public function brewCoffee($selection) {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            default:
                throw new CoffeeException('Selection not supported');
        }
    }

    protected function brewEspresso() {
        // Brew an espresso...
    }
}


class PremiumCoffeeMachine extends BasicCoffeeMachine {

    public function brewCoffee($selection) {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            case 'VANILLA':
                return $this->brewVanillaCoffee();
            default:
                throw new CoffeeException('Selection not supported');
        }
    }

    protected function brewVanillaCoffee() {
        // Brew a vanilla coffee...
    }
}


function getCoffeeMachine(User $user) {
    switch ($user->getPlan()) {
        case 'PREMIUM':
            return new PremiumCoffeeMachine();
        case 'BASIC':
        default:
            return new BasicCoffeeMachine();
    }
}


function prepareCoffee(User $user, $selection) {
    $coffeeMachine = getCoffeeMachine($user);
    return $coffeeMachine->brewCoffee($selection);
}



class User
{

     /**
      * @var string
     */
     protected $plan;



     /**
      * @return string
     */
     public function getPlan(): string
     {
         return $this->plan;
     }


     /**
      * @param string $plan
      * @return $this
     */
     public function setPlan(string $plan): self
     {
         $this->plan = $plan;

         return $this;
     }
}