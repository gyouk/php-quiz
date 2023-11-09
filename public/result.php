<?php
require_once('../includes/header.php');

// Processing the POST request for responses.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$answers = $_POST['answers'] ?? [];

	// The logic of calculating the result.
	$total = count($answers);
	$correct = 0;
	$incorrect = 0;

	foreach ($questions_and_answers as $question_index => $question_data) {
		$question_index++;
		if (isset($answers[$question_index]) && $answers[$question_index] == $question_data["correct_answer"]) {
			$correct++;

		} else {
			$incorrect++;

		}
	}


	// Inserting the results into the database.
	$insertQuery = "INSERT INTO results (name, total, correct, incorrect) VALUES (:name, :total, :correct, :incorrect)";
	$stmt = $db->prepare($insertQuery);

	// Linking parameters.
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':total', $total, PDO::PARAM_INT);
	$stmt->bindParam(':correct', $correct, PDO::PARAM_INT);
	$stmt->bindParam(':incorrect', $incorrect, PDO::PARAM_INT);

	$stmt->execute();

}
?>


<h2>Ви успішно пройшли тест!</h2>
<p>Ось ваш результат:</p>
<p><b>Всього:</b> <?php echo $total; ?></p>
<p><b>Правильні відповіді:</b> <?php echo $correct; ?></p>
<p><b>Неправильні відповіді:</b> <?php echo $total - $correct; ?></p>
</div>
</body>
</html>
