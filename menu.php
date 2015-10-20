<?php
    $beatleArray = ['George', 'Ringo', 'Paul', 'John'];
    $titleArray = ['Mrs.', 'Ms.', 'Mr.', 'Undetirmined'];

    class selectMenu {
        private $items;  // array of items.
        private $options; // hold all html options
        private $selectMenu; // final select menu

        function __construct($itemArray='') {
            $this->items = $itemArray;
        }

        private function buildOptions() {
            $this->options = "<option value=''>Select a Title</option>";
            forEach($this->items as $item) {
                $this->options .= "<option value='"
                . $item . "'>"
                . $item . "</option>";
            }
        }

        private function buildOptions2() {
            $this->options = "<option value=''>Select a Beatle</option>";
            forEach($this->items as $item) {
                $this->options .= "<option value='"
                . $item . "'>"
                . $item . "</option>";
            }
        }

        private function buildSelect() {
            $this->selectMenu = "<select name='title'>" . $this->options . "</select>";
        }

        private function buildSelect2() {
            $this->selectMenu = "<select name='beatle'>" . $this->options . "</select>";
        }

        public function setOptions($array) {
            $this->items = $array;
        }

        public function makeMenu() {
            $this->buildOptions();
            $this->buildSelect();
            return $this->selectMenu;
        }

        public function makeMenu2() {
            $this->buildOptions2();
            $this->buildSelect2();
            return $this->selectMenu;
        }
    }

    $titleMenu = new selectMenu;
    $titleMenu->setOptions($titleArray);
    $beatleMenu = new selectMenu;
    $beatleMenu->setOptions($beatleArray);
?>
<form action='submit.php' method="POST">

First Name: <input type="text" name="firstName" /></br>
Last Name: <input type="text" name="lastName" /></br>
Password: <input pattern=".{8,}"   required title="8 characters minimum" type="password" name="password" /></br>
Verify Password: <input pattern=".{8,}"   required title="8 characters minimum" type="password" name="passwordV" /></br>
Title: <?php echo $titleMenu->makeMenu(); ?></br>
Beatle: <?php echo $beatleMenu->makeMenu2(); ?></br>
<input type="submit" value="Submit" /></br>
<input type="hidden" name="bIndex" value="<?php array_search($_POST['beatle'], $beatleArray)?>"/>

</form>
