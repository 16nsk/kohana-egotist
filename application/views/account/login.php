<?php

echo Form::open();

echo Form::label('username', 'Username');
echo Form::input('username');

echo Form::label('password', 'Password');
echo Form::input('password');

echo Form::submit('submit', 'Login');

echo Form::close();
