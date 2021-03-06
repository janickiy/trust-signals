<?php
class Brokers extends Core {
	public function getTitle() {
		echo "Брокеры";
	}
	public function getContent() {
		$date = date("Y-m-d");
		$this->changeLauncher("ospage");
		$adds = new Additions();
		if($adds->isAuth()) {
			$user = $adds->getUserData();
            $this->templateEdit("user_img", $user['img']);
            $this->templateEdit("user_name", $user['name']);
		}
		else {
			$user = NULL;
		}
		if(1) {
			global $mysqli;
			$this->templateEdit("description", "ТОП брокеров по бинарных опционах");
			$this->templateEdit("page_name", "Брокеры");
			$last = $mysqli->query("SELECT `date`, `title`, `id` FROM `home_news`ORDER BY `id` DESC LIMIT 3");
			$last_news = "";
			if($last->num_rows) {
				$l = $mysqli->assoc($last);
				do {
					$title = $l['title'];
					if(mb_strlen($title) > 50) {
						$title = mb_substr($title, 0, 50) . "...";
					}
					$ln = new Reader("default");
					$ln->view("ospage/mini");
					$ln->change("id", $l['id']);
					$ln->change("title", $title);
					$ln->change("date", $l['date']);
					$ln->change("uri", URI);
					$last_news .= $ln->show();
				}
				while($l = $mysqli->assoc($last));
			}
			else {
				$ln = new Reader("default");
				$ln->view("ospage/mini_empty");
				$last_news .= $ln->show();
			}
			$this->templateEdit("mini", $last_news);
			$b = new Reader("default");
			$b->view("ospage/brokers");
			echo $b->show();
		}
		else {
			$adds->redirect(URI."/cabinet/");
		}
	}
}
?>