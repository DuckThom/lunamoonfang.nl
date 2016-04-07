class AccountController < ApplicationController
  def index
    redirect_to '/login' and return unless logged_in?
  end
end
