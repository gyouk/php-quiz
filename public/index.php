<?php
require('../includes/header.php');
?>
<form method="POST" action="result.php">

    <input type="text" name="name" placeholder="<?php echo htmlspecialchars('Введіть ваше ім’я', ENT_QUOTES, 'UTF-8'); ?>" required>
    <br>
	<?php
	if (isset($questions_and_answers)) {
		$questionNumber = 1;
		foreach ($questions_and_answers as $question_data) {
			echo "<p> $questionNumber. " . $question_data["question"] . "</p>";

			echo "<div class='answers-column'>";
			foreach ($question_data["answers"] as $key => $answer) {
				echo "<label class='answer-label'>
                                          <input type='radio' name='answers[$questionNumber]' value='$key'>
                                          $answer
                                         </label>";
			}
			echo "</div>";

			echo "<br>";
			$questionNumber++;
		}
	}

	?>

    <button class="btn">Завершити</button>
</form>
</div>
</div>
</section>
</main>
</body>
</html>
