class Account < ActiveRecord::Base
  attr_accessor :username

  has_secure_password

  validates :password, presence: true, length: { minimum: 6 }
  validates :username, presence: true

end
