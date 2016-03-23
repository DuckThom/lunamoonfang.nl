class AboutController < ApplicationController
  def index
    birthdate = Date.new(1995, 11, 26)
    today     = Date.today

    @age = age_in_completed_years(birthdate, today)
  end
end

def age_in_completed_years (bd, d)
  # Difference in years, less one if you have not had a birthday this year.
  a = d.year - bd.year
  a = a - 1 if (
  bd.month >  d.month or
      (bd.month >= d.month and bd.day > d.day)
  )
  a
end

