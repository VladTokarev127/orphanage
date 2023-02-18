<?php
	get_header();
?>

<!-- start section form -->
<section class="form">
	<div class="container">

		<div class="form__block">
			<h2 class="title form__title">Как помочь?</h2>
			<div class="form__radios">
				<div class="form__radio">
					<input type="radio" name="type" id="type-1" checked>
					<label for="type-1">Разовая помощь</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="type" id="type-2">
					<label for="type-2">Ежемесячная оплата</label>
				</div>
			</div>
			<div class="form__tabs" data-tabs>
				<button class="form__tab form__tab_green is-active" data-tab>Оплата картой</button>
				<button class="form__tab form__tab_blue" data-tab>Банковский перевод</button>
				<button class="form__tab form__tab_yellow" data-tab>Оплата с помощью QR - кода</button>
			</div>
			<div class="form__contents" data-contents>
				<div class="form__content" data-content>
					<form action="" class="form__inner">
						<div class="form__input form__input_val">
							<input type="text" name="Сумма пожертвования" placeholder="Сумма пожертвования" required>
						</div>
						<div class="form__input">
							<input type="text" name="Ваше имя" placeholder="Ваше имя" required>
						</div>
						<div class="form__input">
							<input type="tel" name="Ваш телефон" placeholder="Ваш телефон" required>
						</div>
						<div class="form__input">
							<input type="email" name="Ваш Email" placeholder="Ваш Email" required>
						</div>
						<div class="form__btn">
							<button type="submit" class="btn btn_green">Помочь</button>
						</div>
						<div class="form__checkboxs">
							<div class="form__checkbox">
								<input type="checkbox" name="check-1" id="check-1" required>
								<label for="check-1">Я принимаю Условия <a href="/offer">договора оферты</a></label>
							</div>
							<div class="form__checkbox">
								<input type="checkbox" name="check-2" id="check-2" required>
								<label for="check-2">Соглашаюсь на обработку моих <a href="/personality">персональных данных</a></label>
							</div>
						</div>
					</form>
				</div>
				<div class="form__content" data-content>
					<div class="form__rows">
						<div class="form__row">
							<div class="form__name">Полное наименование</div>
							<div class="form__val">Благотворительный фонд «Дети будущего»</div>
						</div>
						<div class="form__row">
							<div class="form__name">Юридический адрес</div>
							<div class="form__val">420064, РТ, г.Казань, ул.Баки Урманче, д.7, помещение 1212, оф.10</div>
						</div>
						<div class="form__row">
							<div class="form__name">ИНН/КПП</div>
							<div class="form__val">1684008141 / 168401001</div>
						</div>
						<div class="form__row">
							<div class="form__name">Расчетный счёт</div>
							<div class="form__val">40703810507500000289</div>
						</div>
						<div class="form__row">
							<div class="form__name">Корреспондентский счёт</div>
							<div class="form__val">30101810845250000999</div>
						</div>
						<div class="form__row">
							<div class="form__name">Бик Банка</div>
							<div class="form__val">044525999</div>
						</div>
						<div class="form__row">
							<div class="form__name">Банк</div>
							<div class="form__val">ТОЧКА ПАО БАНКА "ФК ОТКРЫТИЕ"</div>
						</div>
					</div>
				</div>
				<div class="form__content" data-content>
					<div class="form__qr"><img src="/wp-content/themes/house/img/hero-qr-1.jpg" alt=""></div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- end section form -->

<?php get_footer(); ?>